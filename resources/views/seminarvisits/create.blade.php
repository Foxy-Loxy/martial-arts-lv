@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;"
                   href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('seminar.seminarvisit.create')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('seminars.visit.store', [ 'seminar' => $seminar->id])}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="trainee_id">{{__('seminar.seminarvisit.model.trainee_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('trainee_id') is-invalid @enderror" id="trainee_id"
                                            name="trainee_id">
                                        @foreach($trainees as $trainee)
                                            <option value="{{ $trainee->id }}">{{ $trainee->name }} #{{ $trainee->id }}</option>
                                        @endforeach
                                    </select>

                                    @error('trainee_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('app.save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
