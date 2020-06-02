@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('school.schools')}}@auth<a class="float-right btn btn-primary"
                                                       href="{{route('schools.create')}}">{{__('school.create')}}@endauth</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('school.model.name')}}</th>
                                @auth
                                    <th scope="col">{{__('app.edit')}}</th>
                                    <th scope="col">{{__('app.delete')}}</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schools as $school)
                                <tr>
                                    <th scope="row">{{$school->id}}</th>
                                    <td>
                                        <a href="{{route('schools.show', ['school' => $school->id])}}">{{$school->name}}</a>
                                    </td>
                                    @auth
                                    <td>
                                        <a class="btn btn-success"
                                           href="{{route('schools.edit', ['school' => $school->id])}}">{{__('app.edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{route('schools.destroy', ['school' => $school->id])}}"
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
                {{ $schools->links() }}
            </div>
        </div>
    </div>
@endsection
