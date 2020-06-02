@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{ URL::previous() }}">{{__('app.back')}}</a>
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('school.school')}} "{{ $school->name }}"</h4>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success"
                           href="{{route('schools.edit', ['school' => $school->id])}}">{{__('app.edit')}}</a>
                        <form style="display: inline-block; padding-bottom: 10px" action="{{route('schools.destroy', ['school' => $school->id])}}"
                              method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">{{__('app.delete')}}</button>
                        </form>
                        <h5>{{__('branch.branches')}}</h5>
                        @if($school->branches->isNotEmpty())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('branch.model.name')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($school->branches as $branch)
                                <tr>
                                    <th scope="row">{{$branch->id}}</th>
                                    <td>
                                        <a href="{{route('branches.show', ['branch' => $branch->id])}}">{{$branch->name}}</a>
                                    </td>
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
