@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;"
                   href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('exam.exampass.show.cardHead', [
                            'name' => $exampass->trainee->name,
                            'date' => $exampass->exam->when->toDateString(),
                        ])}}</h4>
                    </div>
                    <div class="card-body">
                        @auth
                            <a class="btn btn-success"
                               href="{{route('exampasses.edit', ['exampass' => $exampass->id])}}">{{__('app.edit')}}</a>
                            <form style="display: inline-block; padding-bottom: 10px"
                                  action="{{route('exampasses.destroy', ['exampass' => $exampass->id])}}"
                                  method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                            </form>
                        @endauth
                        <p>{{__('exam.exampass.model.branch_id')}}: <a
                                href="{{route('branches.show', ['branch' => $exampass->exam->branch_id])}}">{{$exampass->exam->branch->name}}</a>
                        </p>
                        <p>{{__('exam.exampass.model.when')}}: <a
                                href="{{route('exams.show', ['exam' => $exampass->exam_id])}}">{{$exampass->exam->when->toDateString()}}</a>
                        </p>
                        <h4>{{__('exam.exampass.show.commentary')}}</h4>
                        <p>{{$exampass->commentary ?? __('app.none')}}</p>
                        <h4>{{__('exam.exampass.show.result')}}</h4>
                        @switch($exampass->result)
                            @case('pass')
                            <p class="btn btn-success">{{__('exam.exampass.status.pass')}}</p>
                            @break
                            @case('fail')
                            <p class="btn btn-danger">{{__('exam.exampass.status.fail')}}</p>
                            @break
                            @case('miss')
                            <p class="btn btn-warning">{{__('exam.exampass.status.miss')}}</p>
                            @break
                            @case('upcoming')
                            <p class="btn btn-dark text-light">{{__('exam.exampass.status.upcoming')}}</p>
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
