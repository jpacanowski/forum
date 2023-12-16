@extends('dashboard.base')

@section('navbar')
  <aside class="main-sidebar">
    <nav>
      <ul>
        <li class="{{ Route::is('dashboard.index') ? 'active' : '' }}"><a href="/dashboard"><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i> Dashboard</a></li>
        <!-- <li class=""><a href="/dashboard/profile"><i class="fa fa-user fa-fw" aria-hidden="true"></i> My profile</a></li> -->
        <li class="{{ Route::is('dashboard.threads') ? 'active' : '' }}"><a href="/dashboard/threads"><i class="fa fa-list fa-fw" aria-hidden="true"></i> Threads</a></li>
        <li class="{{ Route::is('dashboard.posts') ? 'active' : '' }}"><a href="/dashboard/posts"><i class="fa fa-list fa-fw" aria-hidden="true"></i> Posts</a></li>
        <li class="{{ Route::is('dashboard.users') ? 'active' : '' }}"><a href="/dashboard/users"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Users</a></li>
        <li class="{{ Route::is('dashboard.categories') ? 'active' : '' }}"><a href="/dashboard/categories"><i class="fa fa-link fa-fw" aria-hidden="true"></i> Categories</a></li>
        <li class="{{ Route::is('dashboard.settings') ? 'active' : '' }}"><a href="/dashboard/settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> Settings</a></li>
        <li class="{{ Route::is('dashboard.about') ? 'active' : '' }}"><a href="/dashboard/about"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i> About CMS</a></li>
      </ul>
    </nav>
  </aside>
@endsection
