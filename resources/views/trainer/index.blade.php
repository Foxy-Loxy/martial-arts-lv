@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('trainer.trainers')}}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('trainer.model.name')}}</th>
                                <th scope="col">{{__('trainer.model.branch_id')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trainers as $trainer)
                                <tr>
                                    <th scope="row">{{$trainer->id}}</th>
                                    <td>
                                        <a href="{{route('trainers.show', ['trainer' => $trainer->id])}}">{{$trainer->name}}</a>
                                    </td>
                                    <td>
                                        @if($trainer->branch)
                                            <a href="{{route('branches.show', ['branch' => $trainer->branch->id])}}">{{$trainer->branch->name}}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $trainers->links() }}
            </div>
        </div>
    </div>
@endsection
