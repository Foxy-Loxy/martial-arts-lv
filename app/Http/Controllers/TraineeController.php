<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\Trainee\TraineeStoreRequest;
use App\Models\Eloquent\Trainee;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('trainees.index', [
            'trainees' => Trainee::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('trainees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TraineeStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(TraineeStoreRequest $request)
    {
        Trainee::create($request->toArray());

        Flash::push('toast', __('trainee.createTraineeSuccess'));

        return redirect(route('trainees.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Trainee $trainee
     * @return Application|Factory|View
     */
    public function show(Trainee $trainee)
    {
        return view('trainees.show', [
            'trainee' => $trainee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Trainee $trainee
     * @return Application|Factory|View
     */
    public function edit(Trainee $trainee)
    {
        return view('trainees.edit', [
            'trainee' => $trainee
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TraineeStoreRequest $request
     * @param Trainee $trainee
     * @return Application|RedirectResponse|Redirector
     */
    public function update(TraineeStoreRequest $request, Trainee $trainee)
    {
        $trainee->update($request->toArray());

        Flash::push('toast', __('trainee.editTraineeSuccess'));

        return redirect(route('trainees.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Trainee $trainee
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Trainee $trainee)
    {
        $trainee->delete();

        Flash::push('toast', __('trainee.deleteTraineeSuccess'));

        return redirect(route('trainees.index'));
    }
}
