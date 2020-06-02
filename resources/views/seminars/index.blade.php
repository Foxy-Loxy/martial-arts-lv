@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('seminar.seminars')}}@auth<a class="float-right btn btn-primary" href="{{route('seminars.create')}}">{{__('app.create')}}@endauth</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('seminar.model.when')}}</th>
                                <th scope="col">{{__('seminar.model.branch_id')}}</th>
                                <th scope="col">{{__('seminar.model.name')}}</th>
                                @auth
                                    <th scope="col">{{__('app.edit')}}</th>
                                    <th scope="col">{{__('app.delete')}}</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seminars as $seminar)
                                <tr>
                                    <th>
                                        {{$seminar->id}}
                                    </th>
                                    <td>
                                        <p>{{$seminar->when->toDateString()}}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('branches.show', ['branch' => $seminar->branch->id])}}">{{$seminar->branch->name}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('seminars.show', ['seminar' => $seminar->id])}}">{{$seminar->name}}</a>
                                    </td>
                                    @auth
                                    <td>
                                        <a class="btn btn-success"
                                           href="{{route('seminars.edit', ['seminar' => $seminar->id])}}">{{__('app.edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{route('seminars.destroy', ['seminar' => $seminar->id])}}"
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
                {{ $seminars->links() }}
            </div>
        </div>
    </div>
@endsection
