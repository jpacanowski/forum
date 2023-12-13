@extends('dashboard.base')

@section('title', 'Edit post')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Edit post</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <form class="form" method="post" action="/posts/{{$post->id}}">

      @csrf
      @method('PUT')

      <label for="post_content" class="visually-hidden">Comment:</label>
      <textarea id="post_content" name="content" type="text" class="form-control" rows="8">{{ $post->content }}</textarea>

      <input type="submit" value="Save changes" />

    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>ClassicEditor.create(document.querySelector('#post_content'))</script>

  </main>
@endsection
