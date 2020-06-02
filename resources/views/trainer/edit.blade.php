@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;"
                   href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <a id="info"></a><h4>{{__('trainer.profile.info')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="name">{{__('trainer.model.name')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name" id="name" value="{{ $trainer->name }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="email">{{__('trainer.model.email')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                           name="email" id="email" value="{{ $trainer->email }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="address">{{__('trainer.model.address')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('address') is-invalid @enderror" type="text"
                                           name="address" id="address" value="{{ $trainer->address }}">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="title">{{__('trainer.model.title')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('title') is-invalid @enderror" type="text"
                                           name="title" id="title" value="{{ $trainer->title }}">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="about">{{__('trainer.model.about')}}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('about') is-invalid @enderror" type="text"
                                              name="about" id="about">{{ $trainer->about }}</textarea>

                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="phone">{{__('trainer.model.phone')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                           name="phone" id="phone" value="{{ $trainer->phone }}">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="bday">{{__('trainer.model.bday')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('bday') is-invalid @enderror" type="date"
                                           name="bday" id="bday" value="{{ $trainer->bday->toDateString() }}">

                                    @error('bday')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="branch_id">{{__('trainer.model.branch_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('branch_id') is-invalid @enderror" id="branch_id"
                                            name="branch_id">
                                        @foreach(\App\Models\Eloquent\Branch::all() as $branch)
                                            <option @if($branch->id === $trainer->branch_id) selected
                                                    @endif value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('branch_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="level">{{__('trainer.model.level')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('level') is-invalid @enderror" type="number"
                                           step="1"
                                           name="level" id="level" value="{{ $trainer->level }}">

                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="level_type">{{__('trainer.model.level_type')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('level_type') is-invalid @enderror"
                                            id="level_type" name="level_type">
                                        <option @if($trainer->level_type === 'que') selected
                                                @endif value="que">{{__('trainer.model.level_type_que')}}</option>
                                        <option @if($trainer->level_type === 'dan') selected
                                                @endif value="dan">{{__('trainer.model.level_type_dan')}}</option>
                                    </select>

                                    @error('level_type')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('school.update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <a id="photo"></a><h4>{{__('trainer.profile.photo')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <b>{{__('trainer.profile.currentPhoto')}}</b>
                        </div>
                        @if($trainer->photo)
                            <div class="d-flex justify-content-center">
                                <img class="img-thumbnail" src="{{ asset("storage/$trainer->photo") }}" alt="">
                            </div>
                        @else
                            {{__('trainer.profile.noCurrentPhoto')}}
                        @endif
                        <br>
                        <form action="{{route('profile.update.photo')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <input type="file"
                                           class="form-control form-control-file @error('photo') is-invalid @enderror"
                                           id="photo" name="photo">

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('school.update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <a id="password"></a><h4>{{__('trainer.profile.password')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.update.password')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="password">{{__('trainer.model.password')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                           step="1"
                                           name="password" id="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="password_confirmation">{{__('trainer.model.password_confirmation')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                                           step="1"
                                           name="password_confirmation" id="password_confirmation">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('school.update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

