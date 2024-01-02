@extends('dashboard.base')

@section('title', 'Edit user')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Edit user</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <form class="form" method="post" action="/users/{{$user->id}}">

      @csrf
      @method('PUT')

      <label for="username">Username:</label>
      <input id="username" name="name" type="text" class="form-control" value="{{ $user->name }}" />

      @error('name')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="email">E-mail:</label>
      <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" />

      @error('email')
        <p class="alert-danger">{{$message}}</p>
      @enderror

      <label for="role">User role:</label>
      <select id="role" name="role" class="form-control">
        <option value="USER" {{ $user->role == 'USER' ? 'selected' : '' }}>USER</option>
        <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
      </select>

      <input type="submit" value="Save changes" />

    </form>

  </main>
@endsection
