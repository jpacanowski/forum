@extends('dashboard.base')

@section('title', 'Threads')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Users</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <table class="table_users">
      <thead>
        <tr>
          <th scope="col">Username</th>
          <!-- <th scope="col">Full name</th> -->
          <th scope="col">E-mail</th>
          <th scope="col">Role</th>
          <!-- <th scope="col">Last activity</th> -->
          <th scope="col">Posts</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <!-- <td>{{ $user->firstname }} {{ $user->lastname }}</td> -->
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <!-- <td>{{ $user->last_activity }}</td> -->
            <td>{{ $user->posts->count() }}</td>
            <td>
              <a href="/dashboard/users/edit/{{$user->id}}" class="btn-edit1">Edit</a>
              <form class="form_delete" style="display:inline;" method="POST" action="/users/{{$user->id}}">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <a href="/dashboard/users/delete/{{$user->id}}" class="btn-delete1" onclick="event.target.parentNode.submit(); return false;">Delete</a>
              </form>
            </td>
            <!-- <td>{{ '30 mins ago' }}</td> -->
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"></td>
        </tr>
      </tfoot>
    </table>

    <!-- <a href="/dashboard/users/create" class="button">Add new user</a> -->

  </main>
@endsection
