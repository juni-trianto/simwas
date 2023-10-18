@extends('layouts.app')
@section('content')
<h6><b>  {{ $page_title }}</b></h6>
<nav  style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item" ><i class="bi bi-house-door-fill"></i> <a href="{{ url('/home') }}" style="text-decoration: none;color:black;">HOME</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-3 card border border-0">
        <div class="card-body">
        <nav class="nav flex-column">
                <a class="nav-link @if(Request::segment(2) == 'user' ) bg-danger text-white @else text-dark @endif "  href="{{ route('user') }}"><i class="bi bi-people-fill"></i> Manajemen User</a>
                <a class="nav-link  @if(Request::segment(2) == 'menu' ) bg-danger text-white @else text-dark @endif " href="{{ route('menu') }}"><i class="bi bi-menu-app"></i> Manajemen Menu</a>
            </nav>
        </div>
    </div>
    <div class="col-md-9">
      @yield('page_sub_menu')
    </div>
</div>
@endsection
