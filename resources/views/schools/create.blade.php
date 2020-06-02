@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('school.createSchool')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('schools.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="name">{{__('school.model.name')}}</label>

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
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('school.save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
