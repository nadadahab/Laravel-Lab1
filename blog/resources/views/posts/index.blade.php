@extends('layouts.app')


@section('content')
<div class="text-center">
<h1>Home</h1>
<table border="1px" class="table table-hover">
<tr>
<th>Id</th>
<th>Title</th>
<th>Posted By</th>
<th>Created At</th>
<th>slug</th>
<th>Actions</th>
</tr>

@foreach ($posts as $post)

<tr>
<td>
{{ $post->id }} 
</td>
<td>
{{ $post->title }}
</td>
<td>
{{$post->user->name}}
</td>
<td>
{{ date('M j, Y', strtotime( $post->created_at )) }}

</td>
<td>
{{ $post->slug }}

</td>
<td>
<a href="posts/{{ $post->id }}"  name="view" class="btn btn-info"> view</a>
<a href="posts/edit/{{ $post->id }}"  name="update" class="btn btn-primary"> update</a>
<form method="post" action="posts/delete/{{ $post->id }}">
{{method_field('DELETE')}}
{{csrf_field()}}
<button name="delete" class="btn btn-danger"  onclick="return confirm('You are sure delete this post??')"> delete </button>
</form>
</td>
</tr>

@endforeach
</table>
  <a href="posts/create" class="btn btn-success btn-lg">Add New </a>


</div>
{{ $posts->links() }}

@endsection