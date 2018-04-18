
@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="text-center">
<h1>Add New</h1>
<form method="post" action="/posts" >
{{csrf_field()}}
Title : <input type="text" name="title">
<br><br>
Description :
<input name="description"></input>
<br>
<br>
Post Creator
<select  name="user_id">
@foreach ($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach

</select>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>

@endsection