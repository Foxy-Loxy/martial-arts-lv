@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('trainer.trainer')}} {{ $trainer->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img style="max-width: 300px; max-height: 400px" class="img-thumbnail" src="{{ asset("storage/$trainer->photo") }}" alt="">
                        </div>
                        <div class="d-flex justify-content-center">
                            <p><b>{{$trainer->title}}</b></p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p><i>{{$trainer->level}} {{$trainer->level_type === 'que' ? __('trainer.model.level_type_que') : __('trainer.model.level_type_dan')}}</i></p>
                        </div>
                        <p>{{__('trainer.show.teachesAt')}} @if($trainer->branch)
                                <a href="{{route('branches.show', ['branch' => $trainer->branch->id])}}">
                                    {{ $trainer->branch->name }}
                                </a>
                            @else
                                -
                            @endif
                        </p>
                        <hr>
                        <p>{{$trainer->about}}</p>
                        <hr>
                        <p><b>{{__('trainer.show.contact')}}</b></p>
                        <p>{{__('trainer.model.phone')}}: {{$trainer->phone ?? __('app.none') }}</p>
                        <p>{{__('trainer.model.email')}}: {{$trainer->email ?? __('app.none') }}</p>
                        <hr>
                        <p><b>{{__('trainer.show.pupils')}}</b></p>
                        @if($trainer->trainees->isNotEmpty())
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('trainee.model.name')}}</th>
                                <th scope="col">{{__('trainee.model.level')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trainer->trainees as $trainee)
                                <tr>
                                    <th scope="row">{{$trainee->id}}</th>
                                    <td><a href="{{route('trainees.show', ['trainee' => $trainee->id])}}">{{$trainee->name}}</a></td>
                                    <td>{{$trainee->level}} {{$trainee->level_type === 'que' ? __('trainee.model.level_type_que') : __('trainee.model.level_type_dan')}}</td>
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

