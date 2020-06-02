@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('exam.exams')}}@auth<a class="float-right btn btn-primary" href="{{route('exams.create')}}">{{__('app.create')}}@endauth</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('exam.model.when')}}</th>
                                <th scope="col">{{__('exam.model.branch_id')}}</th>
                                @auth
                                    <th scope="col">{{__('app.edit')}}</th>
                                    <th scope="col">{{__('app.delete')}}</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <th>
                                        <a href="{{route('exams.show', ['exam' => $exam->id])}}">{{$exam->id}}</a>
                                    </th>
                                    <td>
                                        <p>{{$exam->when->toDateString()}}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('branches.show', ['branch' => $exam->branch->id])}}">{{$exam->branch->name}}</a>
                                    </td>
                                    @auth
                                    <td>
                                        <a class="btn btn-success"
                                           href="{{route('exams.edit', ['exam' => $exam->id])}}">{{__('app.edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{route('exams.destroy', ['exam' => $exam->id])}}"
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
                {{ $exams->links() }}
            </div>
        </div>
    </div>
@endsection
