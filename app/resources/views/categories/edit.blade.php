@extends('dashboard.base')

@section('title', 'Edit category')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Edit category</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <form class="form" method="post" action="/categories/{{$category->id}}">

      @csrf
      @method('PUT')

      <label for="username">Name:</label>
      <input id="username" name="name" type="text" class="form-control" value="{{ $category->name }}" />

      @error('name')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="email">Slug:</label>
      <input id="email" name="slug" type="text" class="form-control" value="{{ $category->slug }}" />

      @error('slug')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <input type="submit" value="Save changes" />

    </form>

  </main>
@endsection
