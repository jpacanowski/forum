@extends('threads.base')

@section('title', 'Threads')


@section('content')
  <main class="wrapper">
    <ul class="threads">
      @foreach ($threads as $thread)
        <li class="thread">
          <div class="thread__stats">
            <div class="thread__views">
              <span class="thread__count-data">{{ $thread->visits }}</span>
              <span class="thread__count-pad">views</span>
            </div>
            <div class="thread__answers">
              <span class="thread__count-data">{{ $thread->posts->count() - 1 }}</span>
              <span class="thread__count-pad">answers</span>
            </div>
          </div>
          <div>
            <h2 class="thread__heading"><a href="/{{ $thread->slug }}">{{ $thread->subject }}</a></h2>
            <span class="thread__info">
              Rozpoczął: <a href="/user/{{ $thread->user->name }}">{{ $thread->user->name }}</a>
              @if($thread->posts->count() > 1)
              Ostatnia odpowiedź: <a href="/user/{{ $thread->posts->last()->user->name }}">{{ $thread->posts->last()->user->name }}</a>
              @endif
              [{{ $thread->created_at }}]
            </span>
          </div>
        </li>
      @endforeach
    </ul>
  </main>
@endsection
