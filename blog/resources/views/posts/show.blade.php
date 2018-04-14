@extends('layouts.app')
@section('content')
@if(count($post))
        <fieldset>
            <legend style="background-color: gray">Post Info </legend>
         <h5>Tille :{{ $post->title }}</h5>
         <p> Description:{{ $post->description }}</p>
        <hr> 
    </fieldset>
    <fieldset>
        <legend style="background-color: gray">Post Creator Info </legend>
        <p>Name : {{ $post->user->name }}</p>
        <p> Email:{{ $post->user->email }}</p>
        <p> Created At :{{ $post->created_at->format('l jS \\of F Y h:i:s A') }}</p>
    <hr> 
</fieldset>
    @endif 
@endsection