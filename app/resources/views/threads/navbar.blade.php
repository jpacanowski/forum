@extends('threads.base')

@section('navbar')
  <div class="nav-wrapper">
    <nav class="nav">
      <ul>
        <li>
          <a href="/">Recent threads</a>
        </li>
        @if (Auth::check())
          <li>
            <a href="/thread">Create new thread</a>
          </li>
          <li>
            <a href="/user/Kaz/threads">Your threads</a>
          </li>
          <li>
            <a href="/user/Kaz/posts">Your posts</a>
          </li>
        @endif
      </ul>
      <div style="float: right">
        @if (Auth::check())
          @if (Auth::user()->role == 'ADMIN')
            <a href="/dashboard">ADMIN</a>
          @endif
          <form method="POST" action="/users/logout" style="display: inline">
            @csrf
            @method('POST')
            <button type="submit" class="logout">
              Logout ({{ Auth::user()->name }})
            </button>
          </form>
        @else
          <a href="/users/login" class="login">Log in</a>
        @endif
      </div>
    </nav>
  </div>
@endsection
