@extends('dashboard.base')

@section('header')
  <header class="main-header">
    <h1><span>Forum</span></h1>
    <nav>
      {{ Auth::user()->name }}
      <a href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
      <a href="/dashboard/profile"><i class="fa fa-user" aria-hidden="true"></i></a>
      <form method="POST" action="/users/logout" style="display: inline">
        @csrf
        @method('POST')
        <button type="submit" class="btn_logout">
          <i class="fa fa-power-off" aria-hidden="true"></i>
        </button>
      </form>
    </nav>
  </header>
@endsection
