<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
@extends('layouts.app')@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    @if ($errors->any())
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
@endif
<p>Name: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>
<p>Role: {{$user->is_admin ? 'Admin': 'Member'}}</p>
<form action="{{route('edit_profile')}}" method="post">
@csrf
<label>Name</label>
<br>
<input type="text" name="name" velue="{{$user->name}}" id="">
<br>
<label>Password</label>
<br>
<input type="password" name="password" id="">
<br>
<label>Confirm password</label><br>
<input type="password" name="password_confirmation" id="">
<br>
<button type="submit">Change profile detail</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
