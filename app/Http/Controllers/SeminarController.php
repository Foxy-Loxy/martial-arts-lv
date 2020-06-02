<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\Seminar\SeminarDocSetRequest;
use App\Http\Requests\Seminar\SeminarStoreRequest;
use App\Http\Requests\Seminar\SeminarVisitStoreRequest;
use App\Models\Eloquent\Seminar;
use App\Models\Eloquent\SeminarVisit;
use App\Models\Eloquent\Trainee;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('seminars.index', [
            'seminars' => Seminar::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('seminars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SeminarStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(SeminarStoreRequest $request)
    {
        Seminar::create($request->toArray());

        Flash::push('toast', __('seminar.createSeminarSuccess'));

        return redirect(route('seminars.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Seminar $seminar
     * @return Application|Factory|View
     */
    public function show(Seminar $seminar)
    {
        return view('seminars.show', [
            'seminar' => $seminar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seminar $seminar
     * @return Application|Factory|View
     */
    public function edit(Seminar $seminar)
    {
        return view('seminars.edit', [
            'seminar' => $seminar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SeminarStoreRequest $request
     * @param Seminar $seminar
     * @return Application|RedirectResponse|Redirector
     */
    public function update(SeminarStoreRequest $request, Seminar $seminar)
    {
        $seminar->update($request->toArray());

        Flash::push('toast', __('seminar.editSeminarSuccess'));

        return redirect(route('seminars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Seminar $seminar
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Seminar $seminar)
    {
        $seminar->delete();

        Flash::push('toast', __('seminar.deleteSeminarSuccess'));

        return redirect(route('seminars.index'));
    }

    public function setDoc(Seminar $seminar, SeminarDocSetRequest $request)
    {
        $seminar->update([
            'protocol' => $request
                ->file('doc')
                ->storeAs('public/docs', $request->file('doc')->getClientOriginalName(), 'public'),
        ]);

        Flash::push('toast', __('seminar.documentUpdateSuccess'));

        return redirect()->route('seminars.edit', [ 'seminar' => $seminar->id ]);
    }

    public function removeDoc(Seminar $seminar)
    {
        $seminar->protocol = null;
        $seminar->save();

        Flash::push('toast', __('seminar.documentRemoveSuccess'));

        return redirect()->route('seminars.edit', [ 'seminar' => $seminar->id ]);
    }

    public function createVisit(Seminar $seminar)
    {
        $seminarTraineeIds = SeminarVisit::where([
            'seminar_id' => $seminar->id,
        ])->get()->pluck('trainee_id');

        return view('seminarvisits.create', [
            'seminar' => $seminar,
            'trainees' => Trainee::whereNotIn('id', $seminarTraineeIds)->get(),
        ]);
    }

    public function storeVisit(Seminar $seminar, SeminarVisitStoreRequest $request)
    {
        SeminarVisit::create([
            'seminar_id' => $seminar->id,
            'trainee_id' => $request->get('trainee_id'),
        ]);

        return redirect()->route('seminars.show', [ 'seminar' => $seminar->id]);
    }

    public function destroyVisit(SeminarVisit $seminarvisit)
    {
        $seminar = $seminarvisit->seminar;

        $seminarvisit->delete();

        return redirect()->route('seminars.show', [ 'seminar' => $seminar->id]);
    }
}
