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
        <li><b>380p.</b> - Kaz</li>
        <li><b>350p.</b> - mono</li>
        <li><b>240p.</b> - jhusak</li>
      </ol>
    </div>
  </aside>
@endsection
