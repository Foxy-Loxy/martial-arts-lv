<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\Branch\BranchStoreRequest;
use App\Models\Eloquent\Branch;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('branches.index', [
            'branches' => Branch::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BranchStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(BranchStoreRequest $request)
    {
        Branch::create($request->toArray());

        Flash::push('toast', __('branch.createBranchSuccess'));

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Branch $branch
     * @return Application|Factory|View
     */
    public function show(Branch $branch)
    {
        return view('branches.show', [
            'branch' => $branch,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return Application|Factory|View
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', [
            'branch' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BranchStoreRequest $request
     * @param Branch $branch
     * @return Application|RedirectResponse|Redirector
     */
    public function update(BranchStoreRequest $request, Branch $branch)
    {
        $branch->update($request->toArray());

        Flash::push('toast', __('branch.editBranchSuccess'));

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        Flash::push('toast', __('branch.deleteBranchSuccess'));

        return redirect(route('branches.index'));
    }
}
