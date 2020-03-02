@extends('layouts.app')


@section('content')

<div class="top-right" style="width: 50px;">
    <a href="/profile/{{Auth::user()->id}}">
        <img src="https://static.thenounproject.com/png/771237-200.png" style="width: 50px; margin-top: -10px; margin-right: -20px;">
    </a>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Users</div>


                <div class="card-body" style="width: 1110px;">
                    <div class="row pl-5">
                        @include('userList', ['users'=>$users])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
