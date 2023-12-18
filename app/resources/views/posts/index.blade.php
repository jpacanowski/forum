@extends('threads.base')

@section('title', 'Posts')


@section('navbar')
  @include('threads.navbar')
@stop

@section('content')
  <main class="content">
    <ul class="threads">
      @foreach ($posts as $post)
        <li class="thread">
          <div class="thread__stats">
            <div class="thread__views">
              <span class="thread__count-data">{{ $post->thread->visits }}</span>
              <span class="thread__count-pad">views</span>
            </div>
            <div class="thread__answers">
              <span class="thread__count-data">{{ $post->thread->posts->count() }}</span>
              <span class="thread__count-pad">answers</span>
            </div>
          </div>
          <div>
            <h2 class="thread__heading"><a href="/{{ $post->thread->slug }}">{{ $post->thread->subject }}</a></h2>
            <span class="thread__info">
              <a href="/{{$post->thread->slug}}#post_{{$post->id}}">Answer</a> {{$post->created_at->diffForHumans()}} in <a href="/categories/{{ $post->thread->category->slug }}">{{ $post->thread->category->name }}</a>
            </span>
          </div>
        </li>
      @endforeach
    </ul>
  </main>
@endsection

@section('panel')
  @include('threads.panel')
@stop
