@extends('threads.base')

@section('title', 'Threads')


@section('navbar')
  @include('threads.navbar')
@stop

@section('content')
  <main class="content">
    <ul class="threads">
      @foreach ($threads as $thread)
        <li class="thread {{ $thread->status == 'CLOSED' ? 'thread--closed' : '' }}">
          <div class="thread__stats">
            <div class="thread__views">
              <span class="thread__count-data">{{ $thread->visits }}</span>
              <span class="thread__count-pad">views</span>
            </div>
            <div class="thread__answers">
              <span class="thread__count-data">{{ $thread->posts->count() }}</span>
              <span class="thread__count-pad">answers</span>
            </div>
          </div>
          <div>
            <h2 class="thread__heading"><a href="/{{ $thread->slug }}">{{ $thread->subject }} {{ $thread->status == 'CLOSED' ? '[CLOSED]' : '' }}</a></h2>
            <span class="thread__info">
              Rozpoczął: <a href="/user/{{ $thread->user->name }}">{{ $thread->user->name }}</a>
              @if($thread->posts->count() >= 1)
                Ostatnia odpowiedź: <a href="/user/{{ $thread->posts->last()->user->name }}">{{ $thread->posts->last()->user->name }}</a>
                [{{ $thread->posts->last()->created_at }}]
              @else
                [{{ $thread->created_at }}]
              @endif
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
