@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('branch.editSchool', ['name' => $branch->name])}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('branches.update', ['branch' => $branch->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="name">{{__('branch.model.name')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                           name="name" id="name" value="{{$branch->name}}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="school_id">{{__('branch.model.school_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('school_id') is-invalid @enderror" id="school_id" name="school_id">
                                        @foreach(\App\Models\Eloquent\School::all() as $school)
                                            <option @if($school->id === $branch->school_id) selected @endif value="{{ $school->id }}">{{ $school->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('school_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('app.update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
