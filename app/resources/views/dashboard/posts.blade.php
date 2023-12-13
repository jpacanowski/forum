@extends('dashboard.base')

@section('title', 'Posts')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Posts</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <ul class="comments_list">
      @foreach ($posts as $post)
        <li class="comments_list__item">

          <div class="comments_list_item__author">
            From <span>{{ $post->user->name }}</span> on
            <a href="/{{ $post->thread->slug }}">{{ $post->thread->subject }}</a>
            submitted {{ $post->created_at }}
          </div>

          <div class="comments_list_item__comment">{{ strip_tags($post->content) }}</div>

          <ul class="comments_list_item__options">

            <li class="comments_list_item_option__edit"><a href="/dashboard/post/edit/{{$post->id}}" class="btn-edit">Edit</a></li>

            <li class="comments_list_item_option__delete">
              <form class="form_delete" method="POST" action="/posts/{{$post->id}}">
                @csrf
                @method('DELETE')
                <a href="/dashboard/post/delete/{{$post->id}}" class="btn-delete" onclick="event.target.parentNode.submit(); return false;">Delete</a>
              </form>
            </li>

          </ul>

        </li>
      @endforeach
    </ul>

  </main>
@endsection
