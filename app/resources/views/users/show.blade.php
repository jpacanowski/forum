@extends('threads.base')

@section('title', 'User info')


@section('content')
  <main class="wrapper">
    <h2 class="post__heading">{{ $user->name }}</h2>
    <div class="user_info">
      <ul>
        <li>
          <label>Real name:</label>
          <span></span>
        </li>
        <li>
          <label>Email:</label>
          {{ $user->email }}
        </li>
        <li>
          <label>Account created at:</label>
          {{ $user->created_at }}
        </li>
        <li>
          <label>Last seen:</label>
          <span></span>
        </li>
        <li>
          <label>Visits:</label>
          <span></span>
        </li>
        <li>
          <label>Threads created:</label>
          {{ $user->threads->count() }}
        </li>
        <li>
          <label>Number of answers:</label>
          {{ $user->posts->count() }}
        </li>
        <li>
          <label>Points:</label>
          {{ $user->points }}
        </li>
      </ul>
    </div>
  </main>
@endsection
