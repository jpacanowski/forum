@extends('threads.base')

@section('panel')
  <aside class="panel">
    <div class="panel_stats">
      <ul>
        <li>
          <span>{{ $threads_number }}</span> questions
        </li>
        <li>
          <span>{{ $posts_number }}</span> answers
        </li>
        <li>
          <span>{{ $users_number }}</span> users
        </li>
        <li>
          <span></span>
        </li>
      </ul>
    </div>
    <div class="top_users">
      <h4 class="top_users__heading">Top 15 users</h4>
      <ol>
        @foreach ($top_users as $top_user)
          <li><b>{{ $top_user->points }} p.</b> - {{ $top_user->name }}</li>
        @endforeach
      </ol>
    </div>
  </aside>
@endsection
