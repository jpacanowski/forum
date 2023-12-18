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
          <span>{{ $categories->count() }}</span> categories
        </li>
      </ul>
    </div>
    <div class="categories">
      <form class="form" action="/">

        <label for="search" class="visually-hidden">Search:</label>
        <input id="search" name="search" type="search" placeholder="Search..." class="input-control" />

      </form>
    </div>
    <div class="top_users">
      <h4 class="top_users__heading">Top 10 users</h4>
      <ul>
        @foreach ($top_users as $top_user)
          <li>{{ $loop->iteration }}. <b>{{ $top_user->points }} p.</b> - {{ $top_user->name }}</li>
        @endforeach
      </ul>
    </div>
    <div class="categories">
      <h4 class="categories__heading">Categories</h4>
      <ul>
        @foreach ($categories as $category)
          <li><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></li>
        @endforeach
      </ul>
    </div>
  </aside>
@endsection
