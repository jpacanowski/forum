@extends('threads.base')

@section('title', 'Sign-up for a new account')


@section('navbar')
  @include('threads.navbar')
@stop

@section('content')
  <main class="content">
    <h2 class="post__heading">Sign-up for a new account</h2>
    <form class="form_answer" method="post" action="/users">
      @csrf

      <label for="post_subject" class="visually-hidden">User name:</label>
      <input id="post_subject" name="name" type="text" placeholder="User name..." />

      <label for="post_subject" class="visually-hidden">E-mail address:</label>
      <input id="post_subject" name="email" type="text" placeholder="E-mail address..." />

      <label for="post_subject" class="visually-hidden">Password:</label>
      <input id="post_subject" name="password" type="password" placeholder="Password..." />

      <label for="post_subject" class="visually-hidden">Password again:</label>
      <input id="post_subject" name="password_confirmation" type="password" placeholder="Password again..." />

      <input class="btn_submit" type="submit" value="Sign up" />
    </form>
  </main>
@endsection

@section('panel')
  @include('threads.panel')
@stop
