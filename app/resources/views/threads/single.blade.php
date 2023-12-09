@extends('threads.base')

@section('title', $thread->subject)


@section('navbar')
  @include('threads.navbar')
@stop

@section('content')
  <main class="content">
    <h2 class="post__heading">{{ $thread->subject }}</h2>
    <ul class="posts">
      <li class="post">
        <div class="post__info">
          <a href="/user/{{ $thread->user->name }}">{{ $thread->user->name }}</a> ({{ $thread->user->points }} points) <span style="float: right">{{ $thread->created_at->diffForHumans() }}</span>
        </div>
        <div class="post__content">
          {{ $thread->content }}
        </div>
      </li>
      <h2 class="post__heading--answers">{{ $thread->posts->count() }} answers</h2>
      @foreach ($thread->posts as $post)
        <li class="post">
          <div class="post__info">
            <a href="/user/{{ $post->user->name }}">{{ $post->user->name }}</a> ({{ $post->user->points }} points) <span style="float: right">{{ $post->created_at->diffForHumans() }}</span>
          </div>
          <div class="post__content">
            {{ $post->content }}
          </div>
        </li>
      @endforeach
    </ul>

    <button class="btn_answer">Answer</button>

    <form class="form_answer" method="post" action="/posts/{{$thread->id}}">
      @csrf

      <label for="post_content" class="visually-hidden">Write a new post:</label>
      <textarea id="post_content" name="content"></textarea>

      <input class="btn_submit" type="submit" value="Add post" />
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
      $('.form_answer').hide();
      $('.btn_answer').on("click", function() {
        $('.btn_answer').hide();
        $('.form_answer').show();
      });
    </script>
  </main>
@endsection

@section('panel')
  @include('threads.panel')
@stop
