@extends('dashboard.base')

@section('title', 'Edit thread')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Edit thread</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <form class="form" action="/threads/{{ $thread->id }}" method="post">

      @csrf
      @method('PUT')

      <label for="post_title">Thread subject:</label>
      <input id="post_title" name="subject" type="text" value="{{ $thread->subject }}" />

      @error('subject')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="post_status">Thread status:</label>
      <select id="post_status" name="status" class="form-control">
        <option value="OPEN" {{ $thread->status == 'OPEN' ? 'selected' : '' }}>OPEN</option>
        <option value="CLOSED" {{ $thread->status == 'CLOSED' ? 'selected' : '' }}>CLOSED</option>
        <option value="HIDDEN" {{ $thread->status == 'HIDDEN' ? 'selected' : '' }}>HIDDEN</option>
        <option value="IMPORTANT" {{ $thread->status == 'IMPORTANT' ? 'selected' : '' }}>IMPORTANT</option>
      </select>

      <label for="post_category">Thread category:</label>
      <select id="post_category" name="category_id" class="form-control">
        <option value="{{ $thread->category->id }}" selected>{{ $thread->category->name }}</option>
        @foreach ($categories as $category)
          @if($category->name != $thread->category->name)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>

      <label for="post_content">Thread content:</label>
      <textarea id="post_content" name="content">{{ $thread->content }}</textarea>

      <input type="submit" value="Save" />

      <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
      <script>ClassicEditor.create(document.querySelector('#post_content'))</script>

    </form>

  </main>
@endsection
