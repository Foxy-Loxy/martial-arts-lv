<?php

namespace App\Http\Controllers;

use App\Helpers\Flash;
use App\Http\Requests\Trainer\TrainerInfoUpdateRequest;
use App\Http\Requests\Trainer\TrainerPasswordUpdateRequest;
use App\Http\Requests\Trainer\TrainerPhotoSetRequest;
use App\Models\Eloquent\Trainer;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    public function index()
    {
        return view('trainer.index', [
            'trainers' => Trainer::paginate(25),
        ]);
    }

    public function update(TrainerInfoUpdateRequest $request)
    {
        Auth::user()->update($request->toArray());

        Flash::push('toast', __('trainer.profile.infoUpdateSuccess'));

        return redirect()->route('profile.edit');
    }

    public function setPhoto(TrainerPhotoSetRequest $request)
    {
        Auth::user()->update([
            'photo' => $request
                ->file('photo')
                ->store('public/photos', 'public'),
        ]);

        Flash::push('toast', __('trainer.profile.photoUpdateSuccess'));

        return redirect()->route('profile.edit');
    }

    public function setPassword(TrainerPasswordUpdateRequest $request)
    {
        Auth::user()->update([
            'password' => bcrypt($request->get('password')),
        ]);

        Flash::push('toast', __('trainer.profile.passwordUpdateSuccess'));

        return redirect()->route('profile.edit');
    }

    public function edit()
    {
        return view('trainer.edit', [
            'trainer' => \Auth::user(),
        ]);
    }

    public function show(Trainer $trainer)
    {
        return view('trainer.show', [
            'trainer' => $trainer,
        ]);
    }
}
