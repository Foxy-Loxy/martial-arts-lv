@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;"
                   href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('seminar.edit', [ 'name' => $seminar->name ])}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('seminars.update', ['seminar' => $seminar->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="name">{{__('seminar.model.name')}}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" id="name" value="{{$seminar->name}}">

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
                                              name="description" id="description">{{$seminar->description}}</textarea>

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
                                           name="when" id="when" value="{{$seminar->when->toDateString()}}">

                                    @error('when')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="branch_id">{{__('seminar.model.branch_id')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('branch_id') is-invalid @enderror" id="branch_id"
                                            name="branch_id">
                                        @foreach(\App\Models\Eloquent\Branch::all() as $branch)
                                            <option
                                                @if($branch->id === $seminar->branch_id) @endif value="{{ $branch->id }}">{{ $branch->name }}</option>
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
                                    <button type="submit" class="btn btn-primary">{{__('app.update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('seminar.editFile')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <b>{{__('seminar.edit.currentDoc')}}</b>
                        </div>
                        @if($seminar->protocol)
                            <div class="d-flex justify-content-center">
                                <a target="_blank" ref="noopener noreferrer"
                                   href="{{ asset("storage/{$seminar->protocol}") }}">{{$seminar->protocol}}</a>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                <form action="{{route('seminars.file.destroy', [ 'seminar' => $seminar->id ])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{__('app.delete')}}</button>
                                </form>
                            </div>
                        @else
                            <div class="d-flex justify-content-center">
                                {{__('app.none')}}
                            </div>
                        @endif
                    </div>
                    <br>
                    <form action="{{route('seminars.file.store', [ 'seminar' => $seminar->id ])}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <input type="file"
                                       class="form-control form-control-file @error('doc') is-invalid @enderror"
                                       id="doc" name="doc">

                                @error('doc')
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
