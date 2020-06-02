@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('branch.branch')}} "{{ $branch->name }}"</h4>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success"
                           href="{{route('branches.edit', ['branch' => $branch->id])}}">{{__('app.edit')}}</a>
                        <form style="display: inline-block; padding-bottom: 10px" action="{{route('branches.destroy', ['branch' => $branch->id])}}"
                              method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                        </form>
                        <h5>
                            {{__('branch.model.school_id')}}
                            @if($branch->school)
                                <a href="{{ route('schools.show', ['school' => $branch->school->id]) }}"><b>{{ $branch->school->name }}</b></a>
                            @else
                                {{__('app.none')}}
                            @endif
                        </h5>
                        <hr>
                        <p><b>{{__('branch.show.trainers')}}</b></p>
                        @if($branch->trainers->isNotEmpty())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('trainer.model.name')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branch->trainers as $trainer)
                                    <tr>
                                        <th scope="row">{{$trainer->id}}</th>
                                        <td><a href="{{route('trainers.show', ['trainer' => $trainer->id])}}">{{$trainer->name}}</a></td>
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
