@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('seminar.show.cardHead', [ 'time' => $seminar->when->toDateString(), 'name' => $seminar->name ])}}</h4>
                    </div>
                    <div class="card-body">
                        @auth
                        <a class="btn btn-success"
                           href="{{route('seminars.edit', ['seminar' => $seminar->id])}}">{{__('app.edit')}}</a>
                        <form style="display: inline-block; padding-bottom: 10px" action="{{route('seminars.destroy', ['seminar' => $seminar->id])}}"
                              method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                        </form>
                        @endauth
                        <p>{{__('seminar.model.name')}}: {{ $seminar->name }}</p>
                        <p>{{__('seminar.model.description')}}: {{ $seminar->description }}</p>
                        <p>{{__('seminar.model.protocol')}}: @if($seminar->protocol) <a target="_blank" ref="noopener noreferrer"
                                                                                        href="{{ asset("storage/{$seminar->protocol}") }}">{{explode('/', $seminar->protocol)[2]}}</a> @else {{__('app.none')}} @endif</p>
                        <p>{{__('seminar.model.when')}}: {{ $seminar->when->toDateString() }}</p>
                        <p>{{__('seminar.model.branch_id')}}: <a href="{{ route('branches.show', [ 'branch' => $seminar->branch->id ]) }}">{{ $seminar->branch->name }}</a></p>
                        <h4><b>{{__('seminar.show.seminarVisits')}}</b></h4>
                        @auth
                            <a class="btn btn-success"
                               href="{{route('seminars.visit.create', ['seminar' => $seminar->id])}}">{{__('app.create')}}</a>
                            <br>
                                <br>
                        @endauth
                        @if($seminar->visits->isNotEmpty())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('seminar.seminarvisit.traineeName')}}</th>
                                    @auth
                                        <th scope="col">{{__('app.delete')}}</th>
                                    @endauth
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($seminar->visits as $visit)
                                    <tr>
                                        <th scope="row">{{$visit->id}}</th>
                                        <td><a href="{{route('trainees.show', [ 'trainee' => $visit->trainee->id ])}}">{{$visit->trainee->name}}</a></td>
                                        @auth
                                            <td>
                                                <form action="{{route('seminars.visit.destroy', ['seminarvisit' => $visit->id])}}"
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
