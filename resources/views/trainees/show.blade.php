@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;"
                   href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('trainee.trainee')}} {{ $trainee->name }}</h4>
                    </div>
                    <div class="card-body">
                        @auth
                            <a class="btn btn-success"
                               href="{{route('trainees.edit', ['trainee' => $trainee->id])}}">{{__('app.edit')}}</a>
                            <form style="display: inline-block; padding-bottom: 10px"
                                  action="{{route('trainees.destroy', ['trainee' => $trainee->id])}}"
                                  method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                            </form>
                        @endauth
                        <p>
                            <i>{{$trainee->level}} {{$trainee->level_type === 'que' ? __('trainee.model.level_type_que') : __('trainee.model.level_type_dan')}}</i>
                        </p>
                        <p>{{__('trainee.show.trainer')}} @if($trainee->trainer)
                                <a href="{{route('trainers.show', ['trainer' => $trainee->trainer->id])}}">
                                    {{ $trainee->trainer->name }}
                                </a>
                            @else
                                -
                            @endif
                        </p>
                        <hr>
                        @auth
                            <p><b>{{__('trainee.show.contact')}}</b></p>
                            <p>{{__('trainee.model.phone')}}: {{$trainee->phone ?? __('app.none') }}</p>
                            <p>{{__('trainee.model.email')}}: {{$trainee->email ?? __('app.none') }}</p>
                        @endauth
                        <hr>
                        <p><b>{{__('trainee.show.examsPasses')}}</b></p>
                        @if($trainee->examPasses->isNotEmpty())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('exam.model.when')}}</th>
                                    <th scope="col">{{__('exam.exampass.model.status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trainee->examPasses as $exampass)
                                    <tr>
                                        <th scope="row"><a
                                                href="{{route('exampasses.show', [ 'exampass' => $exampass->id ])}}">{{$exampass->id}}</a>
                                        </th>
                                        <td><a
                                                href="{{route('exams.show', ['exam' => $exampass->exam_id])}}">{{$exampass->exam->when->toDateString()}}</a>
                                        </td>
                                        <td>
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
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            {{__('app.none')}}
                        @endif

                        <hr>
                        <p><b>{{__('trainee.show.seminars')}}</b></p>
                        @if($trainee->visitedSeminars->isNotEmpty())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('seminar.model.name')}}</th>
                                    <th scope="col">{{__('seminar.model.when')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trainee->visitedSeminars as $seminar)
                                    <tr>
                                        <th scope="row">{{$seminar->id}}</th>
                                        <td>
                                            <a href="{{route('seminars.show', ['seminar' => $seminar->id])}}">{{ $seminar->name }}</a>
                                        </td>
                                        <td>{{ $seminar->when->toDateString() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            {{__('app.none')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

