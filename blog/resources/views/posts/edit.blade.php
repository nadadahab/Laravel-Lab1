
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
<h1>Edit</h1>
<form  method="post" action="/posts/update/{{$post->id}}">
{{method_field('put')}}

{{csrf_field()}}
<input type="hidden" name="id" value="{{$post->id}}">
Title : <input type="text" name="title" value="{{$post->title}}">
<br><br>
Description :
<input name="description" value="{{$post->description}}"></inpput>
<br>
<br>
Post Creator
<select  name="user_id">
@foreach ($users as $user)
<option @if($user->id == $post->user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>

@endforeach

</select>
<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>

@endsection