@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('exam.show.cardHead', [ 'time' => $exam->when->toDateString() ])}}</h4>
                    </div>
                    <div class="card-body">
                        @auth
                        <a class="btn btn-success"
                           href="{{route('exams.edit', ['exam' => $exam->id])}}">{{__('app.edit')}}</a>
                        <form style="display: inline-block; padding-bottom: 10px" action="{{route('exams.destroy', ['exam' => $exam->id])}}"
                              method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                        </form>
                        @endauth
                        <p>{{__('exam.model.when')}}: {{ $exam->when->toDateString() }}</p>
                        <p>{{__('exam.model.branch_id')}}: <a href="{{ route('branches.show', [ 'branch' => $exam->branch->id ]) }}">{{ $exam->branch->name }}</a></p>
                        <h4><b>{{__('exam.show.examResults')}}</b></h4>
                        @auth
                            <a class="btn btn-success"
                               href="{{route('exampasses.create', ['exam' => $exam->id])}}">{{__('app.create')}}</a>
                            <br>
                                <br>
                        @endauth
                        @if($exam->passes->isNotEmpty())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('exam.exampass.traineeName')}}</th>
                                    <th scope="col">{{__('exam.exampass.model.status')}}</th>
                                    @auth
                                        <th scope="col">{{__('app.edit')}}</th>
                                        <th scope="col">{{__('app.delete')}}</th>
                                    @endauth
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($exam->passes as $exampass)
                                    <tr>
                                        <th scope="row"><a href="{{route('exampasses.show', [ 'exampass' => $exampass->id ])}}">{{$exampass->id}}</a></th>
                                        <td><a href="{{route('trainees.show', [ 'trainee' => $exampass->trainee->id ])}}">{{$exampass->trainee->name}}</a></td>
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
                                        @auth
                                            <td>
                                                <a class="btn btn-success"
                                                   href="{{route('exampasses.edit', ['exampass' => $exampass->id])}}">{{__('app.edit')}}</a>
                                            </td>
                                            <td>
                                                <form action="{{route('exampasses.destroy', ['exampass' => $exampass->id])}}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                                                </form>
                                            </td>
                                        @endauth
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
