@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('branch.branches')}}@auth<a class="float-right btn btn-primary"
                                                       href="{{route('branches.create')}}">{{__('app.create')}}@endauth</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('branch.model.name')}}</th>
                                <th scope="col">{{__('branch.model.school_id')}}</th>
                                @auth
                                    <th scope="col">{{__('app.edit')}}</th>
                                    <th scope="col">{{__('app.delete')}}</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <th scope="row">{{$branch->id}}</th>
                                    <td>
                                        <a href="{{route('branches.show', ['branch' => $branch->id])}}">{{$branch->name}}</a>
                                    </td>
                                    <td>
                                        @if($branch->school)
                                            <a href="{{route('schools.show', ['school' => $branch->school->id])}}">{{$branch->school->name}}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    @auth
                                    <td>
                                        <a class="btn btn-success"
                                           href="{{route('branches.edit', ['branch' => $branch->id])}}">{{__('app.edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{route('branches.destroy', ['branch' => $branch->id])}}"
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
                {{ $branches->links() }}
            </div>
        </div>
    </div>
@endsection
