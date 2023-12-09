@extends('threads.base')

@section('navbar')
  <div class="nav-wrapper">
    <nav class="nav">
      <ul>
        <li>
          <a href="/">Recent threads</a>
        </li>
        <li>
          <a href="/thread">Create new thread</a>
        </li>
        <li>
          <a href="/user/Kaz/threads">Your threads</a>
        </li>
        <li>
          <a href="/user/Kaz/posts">Your posts</a>
        </li>
      </ul>
      <a href="/login" class="login">Log in</a>
    </nav>
  </div>
@endsection
