@extends('dashboard.base')

@section('title', 'Threads')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Threads</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <ul class="posts">
      @unless(count($threads) == 0)
      @foreach ($threads as $thread)

        <li class="post-entry">
          <div class="row">
            <h3><a href="/{{ $thread->slug }}">{{ $thread->subject }}</a></h3>
            <span>{{ $thread->visits }} views</span>
          </div>
          <div class="row">
            <ul class="post-entry-menu">
              <li>
                <a href="/dashboard/thread/edit/{{ $thread->id }}" class="btn-edit">Edit</a>
              </li>
              <li>
                <form class="form_delete" method="POST" action="/threads/{{ $thread->id }}">
                  @csrf
                  @method('DELETE')
                  <a href="/dashboard/thread/delete/{{ $thread->id }}" class="btn-delete" onclick="event.target.parentNode.submit(); return false;">Delete</a>
                </form>
              </li>
            </ul>
            <time>{{ $thread->created_at }}</time>
          </div>
        </li>

      @endforeach

    </ul>

    @else
      <div class="alert-success">No threads found</div>
    @endunless

  </main>
@endsection
