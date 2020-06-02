<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\ExamPass\ExamPassStoreRequest;
use App\Http\Requests\ExamPass\ExamPassUpdateRequest;
use App\Models\Eloquent\Exam;
use App\Models\Eloquent\ExamPass;
use App\Models\Eloquent\Trainee;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ExamPassController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function create(Exam $exam)
    {
        return view('exampass.create', [
            'exam' => $exam,
            'availableTrainees' => Trainee::whereNotIn('id', $exam->trainees->pluck('id'))->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExamPassStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ExamPassStoreRequest $request)
    {
        ExamPass::create($request->toArray());

        Flash::push('toast', __('exampass.createExamPassSuccess'));

        return redirect(route('exams.show', ['exam' => $request->get('exam_id')]));
    }

    /**
     * Display the specified resource.
     *
     * @param ExamPass $exampass
     * @return Application|Factory|View
     */
    public function show(ExamPass $exampass)
    {
        return view('exampass.show', [
            'exampass' => $exampass,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ExamPass $exampass
     * @return Application|Factory|View
     */
    public function edit(ExamPass $exampass)
    {
        return view('exampass.edit', [
            'exampass' => $exampass
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExamPassUpdateRequest $request
     * @param ExamPass $exampass
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ExamPassUpdateRequest $request, ExamPass $exampass)
    {
        $exampass->update($request->toArray());

        Flash::push('toast', __('exampass.editExamPassSuccess'));

        return redirect(route('exams.show', ['exam' => $exampass->exam_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ExamPass $exampass
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(ExamPass $exampass)
    {
        $examId = $exampass->exam_id;

        $exampass->delete();

        Flash::push('toast', __('exampass.deleteExamPassSuccess'));

        return redirect(route('exams.show', ['exam' => $examId]));
    }
}
