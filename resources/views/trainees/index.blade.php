@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('trainee.trainees')}} @auth<a class="float-right btn btn-primary"
                                                               href="{{route('trainees.create')}}">{{__('app.create')}}</a>@endauth</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('trainee.model.name')}}</th>
                                <th scope="col">{{__('trainee.model.trainer_id')}}</th>
                                @auth
                                    <th scope="col">{{__('app.edit')}}</th>
                                    <th scope="col">{{__('app.delete')}}</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trainees as $trainee)
                                <tr>
                                    <th scope="row">{{$trainee->id}}</th>
                                    <td>
                                        <a href="{{route('trainees.show', ['trainee' => $trainee->id])}}">{{$trainee->name}}</a>
                                    </td>
                                    <td>
                                        @if($trainee->trainer)
                                            <a href="{{route('trainers.show', ['trainer' => $trainee->trainer->id])}}">{{$trainee->trainer->name}}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    @auth
                                        <td>
                                            <a class="btn btn-success"
                                               href="{{route('trainees.edit', ['trainee' => $trainee->id])}}">{{__('app.edit')}}</a>
                                        </td>
                                        <td>
                                            <form action="{{route('trainees.destroy', ['trainee' => $trainee->id])}}"
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
                    </div>
                </div>
                {{ $trainees->links() }}
            </div>
        </div>
    </div>
@endsection
