@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('exam.createSchool')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('exampasses.store')}}" method="POST">
                            @csrf
                            <input name="exam_id" type="hidden" value="{{$exam->id}}">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="trainee_id">{{__('exam.exampass.model.trainee_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('trainee_id') is-invalid @enderror" id="trainee_id"
                                            name="trainee_id">
                                        @foreach($availableTrainees as $trainee)
                                            <option value="{{ $trainee->id }}">{{ $trainee->name }}</option>
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
                                    <button type="submit" class="btn btn-primary">{{__('app.add')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
