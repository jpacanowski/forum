@extends('dashboard.base')

@section('title', 'About Forum')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>About Forum</h1>

    <p>Forum (Version <b>0.1.0</b>)</p>

    <p>This Forum is written in Laravel 10 by <a href="mailto:jakub.pacanowski@gmail.com">Jakub Pacanowski</a></p>

    <p><b>Why is Forum awesome?</b> Forum is absolutely free and lightweight. Don't hesitate and feel free to do whatever you want with this awesome Forum.
      The main reason I started working on this Forum was to create a very lightweight forum.</p>

    <p><b>Do you like this awesome Forum?</b> Send me any feedback on things you like or dislike in this forum.
      I’d like to know what features most people would want. Any suggestions are welcome.</p>

    <p>Big thanks go to <a href="mailto:bartlomiej.malanowski@hotmail.com">Bartłomiej Malanowski</a>
      for his great ideas and suggestions, his invaluable help in code reviews as well as for serving
      me his server for testing purposes. Thank you, man!</p>

    <p>Now go and create you first great threads and posts in this awesome Forum... Good luck.<br/>You still here...?</p>

    <p>
      <div>You will find the latest version of Forum on Github:</div>
      <a href="https://github.com/jpacanowski/forum">https://github.com/jpacanowski/forum</a>
    </p>

  </main>
@endsection
