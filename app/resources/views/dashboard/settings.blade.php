@extends('dashboard.base')

@section('title', 'Settings')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>General settings</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <form class="form" method="post" action="/settings">

      @csrf
      @method('PUT')

      <label for="forum_name">Forum title:</label>
      <input id="forum_name" name="forum_name" type="text" class="form-control" value="{{ $settings->forum_name }}" />

      @error('forum_name')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="forum_tagline">Forum tagline:</label>
      <input id="forum_tagline" name="forum_tagline" type="text" class="form-control" value="{{ $settings->forum_tagline }}" />

      @error('forum_tagline')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="forum_description">Forum description:</label>
      <input id="forum_description" name="forum_description" type="text" class="form-control" value="{{ $settings->forum_description }}" />

      @error('forum_description')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="forum_keywords">Forum keywords:</label>
      <input id="forum_keywords" name="forum_keywords" type="text" class="form-control" value="{{ $settings->forum_keywords }}" />

      @error('forum_keywords')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="forum_url">Forum address (URL):</label>
      <input id="forum_url" name="forum_url" type="url" class="form-control" value="{{ $settings->forum_url }}" />

      @error('forum_url')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="posts_per_page">Posts per page:</label>
      <input id="posts_per_page" name="posts_per_page" type="number" class="form-control" value="{{ $settings->posts_per_page }}" />

      @error('posts_per_page')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <input type="submit" value="Save changes" />

    </form>

  </main>
@endsection
