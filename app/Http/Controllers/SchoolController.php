<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\School\SchoolStoreRequest;
use App\Models\Eloquent\School;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('schools.index', [
            'schools' => School::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SchoolStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(SchoolStoreRequest $request)
    {
        School::create($request->toArray());

        Flash::push('toast', __('school.createSchoolSuccess'));

        return redirect(route('schools.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param School $school
     * @return Application|Factory|View
     */
    public function show(School $school)
    {
        return view('schools.show', [
            'school' => $school,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param School $school
     * @return Application|Factory|View
     */
    public function edit(School $school)
    {
        return view('schools.edit', [
            'school' => $school
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SchoolStoreRequest $request
     * @param School $school
     * @return Application|RedirectResponse|Redirector
     */
    public function update(SchoolStoreRequest $request, School $school)
    {
        $school->update($request->toArray());

        Flash::push('toast', __('school.editSchoolSuccess'));

        return redirect(route('schools.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param School $school
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(School $school)
    {
        $school->delete();

        Flash::push('toast', __('school.deleteSchoolSuccess'));

        return redirect(route('schools.index'));
    }
}
