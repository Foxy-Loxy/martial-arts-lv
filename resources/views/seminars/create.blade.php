@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;"
                   href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('seminar.createSeminar')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('seminars.store')}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="name">{{__('seminar.model.name')}}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
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
                                       for="description">{{__('seminar.model.description')}}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" id="description"></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="when">{{__('seminar.model.when')}}</label>

                                <div class="col-md-6">
                                    <input class="form-control @error('when') is-invalid @enderror" type="date"
                                           name="when" id="when">

                                    @error('when')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="branch_id">{{__('trainee.model.branch_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('branch_id') is-invalid @enderror" id="branch_id"
                                            name="branch_id">
                                        @foreach(\App\Models\Eloquent\Branch::all() as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('branch_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('seminar.save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
