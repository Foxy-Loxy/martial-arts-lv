@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('exam.exampass.edit.cardHead', [
                            'name' => $exampass->trainee->name,
                            'date' => $exampass->exam->when->toDateString(),
                        ])}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('exampasses.update', [ 'exampass' => $exampass->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="commentary">{{__('exam.exampass.model.commentary')}}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('commentary') is-invalid @enderror" type="text"
                                              name="commentary" id="commentary">{{ $exampass->commentary }}</textarea>

                                    @error('commentary')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="result">{{__('exam.exampass.model.result')}}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('result') is-invalid @enderror" id="result"
                                            name="result">
                                        <option value="fail" @if($exampass->result === 'fail') selected @endif>{{ __('exam.exampass.status.fail') }}</option>
                                        <option value="pass" @if($exampass->result === 'pass') selected @endif>{{ __('exam.exampass.status.pass') }}</option>
                                        <option value="miss" @if($exampass->result === 'miss') selected @endif>{{ __('exam.exampass.status.miss') }}</option>
                                        <option value="upcoming" @if($exampass->result === 'upcoming') selected @endif>{{ __('exam.exampass.status.upcoming') }}</option>
                                    </select>

                                    @error('result')
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
