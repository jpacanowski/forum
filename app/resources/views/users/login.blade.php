@extends('threads.base')

@section('title', 'Login')


@section('content')
  <main class="wrapper">
    <div class="vcenter">
      <div class="login-box">

        <h1>Log in</h1>

        @if ($info = session('info'))
          <div class="alert-success">{{ $info }}</div>
        @endif

        <form method="post" action="/users/authenticate">

          @csrf

          <label for="username" class="visually-hidden">Username: *</label>
          <input id="username" type="text" name="name" placeholder="Your username" />

          <label for="password" class="visually-hidden">Password: *</label>
          <input id="password" type="password" name="password" placeholder="Your password" />

          <input type="submit" value="Log in" />

        </form>

      </div>
    </div>
  </main>
@endsection
