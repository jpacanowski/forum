@extends('threads.base')

@section('title', 'Create new thread')


@section('navbar')
  @include('threads.navbar')
@stop

@section('content')
  <main class="content">
    <h2 class="post__heading">New thread</h2>
    <form class="form_answer" method="post" action="/threads">
      @csrf

      <label for="post_category" class="visually-hidden">Thread category:</label>
      <select id="post_category" name="category_id" class="form-control">
      <option value="">[Thread category]</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>

      <label for="post_subject" class="visually-hidden">Thread subject:</label>
      <input id="post_subject" name="subject" type="text" placeholder="Thread subject..." />

      <label for="post_content" class="visually-hidden">Thread content:</label>
      <textarea id="post_content" name="content"></textarea>

      <input class="btn_submit" type="submit" value="Create thread" />
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>ClassicEditor.create(document.querySelector('#post_content'), {toolbar: []})</script>
  </main>
@endsection

@section('panel')
  @include('threads.panel')
@stop
