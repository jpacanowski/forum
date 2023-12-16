@extends('dashboard.base')

@section('title', 'Categories')

@section('header')
  @include('dashboard.header')
@stop

@section('navbar')
  @include('dashboard.navbar')
@stop

@section('content')
  <main class="content">

    <h1>Categories</h1>

    @if ($info = session('info'))
      <div class="alert-success">{{ $info }}</div>
    @endif

    <table class="table_users">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
              <a href="/dashboard/categories/edit/{{$category->id}}" class="btn-edit1">Edit</a>
              <form class="form_delete" style="display:inline;" method="POST" action="/categories/{{$category->id}}">
                @csrf
                @method('DELETE')
                <a href="/dashboard/categories/delete/{{$category->id}}" class="btn-delete1" onclick="event.target.parentNode.submit(); return false;">Delete</a>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"></td>
        </tr>
      </tfoot>
    </table>

    <a href="/dashboard/categories/create" class="button">Add new category</a>

  </main>
@endsection
