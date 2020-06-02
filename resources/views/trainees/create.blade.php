@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <a id="info"></a><h4>{{__('trainee.create')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('trainees.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="name">{{__('trainee.model.name')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name" id="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="email">{{__('trainee.model.email')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text"
                                           name="email" id="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="phone">{{__('trainee.model.phone')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                           name="phone" id="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="bday">{{__('trainee.model.bday')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('bday') is-invalid @enderror" type="date"
                                           name="bday" id="bday">

                                    @error('bday')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="trainer_id">{{__('trainee.model.trainer_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('trainer_id') is-invalid @enderror" id="trainer_id"
                                            name="trainer_id">
                                        @foreach(\App\Models\Eloquent\Trainer::all() as $trainer)
                                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('trainer_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="level">{{__('trainee.model.level')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('level') is-invalid @enderror" type="number"
                                           step="1"
                                           name="level" id="level">

                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="level_type">{{__('trainee.model.level_type')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('level_type') is-invalid @enderror"
                                            id="level_type" name="level_type">
                                        <option value="que">{{__('trainee.model.level_type_que')}}</option>
                                        <option value="dan">{{__('trainee.model.level_type_dan')}}</option>
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
                                    <button type="submit" class="btn btn-primary">{{__('app.create')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
