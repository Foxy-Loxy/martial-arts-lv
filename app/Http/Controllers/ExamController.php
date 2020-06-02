<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\Exam\ExamStoreRequest;
use App\Models\Eloquent\Exam;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('exams.index', [
            'exams' => Exam::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExamStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ExamStoreRequest $request)
    {
        Exam::create($request->toArray());

        Flash::push('toast', __('exam.createExamSuccess'));

        return redirect(route('exams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function show(Exam $exam)
    {
        return view('exams.show', [
            'exam' => $exam,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function edit(Exam $exam)
    {
        return view('exams.edit', [
            'exam' => $exam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExamStoreRequest $request
     * @param Exam $exam
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ExamStoreRequest $request, Exam $exam)
    {
        $exam->update($request->toArray());

        Flash::push('toast', __('exam.editExamSuccess'));

        return redirect(route('exams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exam $exam
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        Flash::push('toast', __('exam.deleteExamSuccess'));

        return redirect(route('exams.index'));
    }
}
