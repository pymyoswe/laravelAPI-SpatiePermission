@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$user->name}}</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form action="{{route('updateRole')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$user->id}}" name="user_id" id="user_id">
                            @foreach($roles as $role)
                                <input type="radio" class="radio radio-inline" name="userRole" value="{{$role->name}}">{{$role->name}}<br>
                            @endforeach
                            <button type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
