@extends("admin.layout")

@section("content")
<div class="container">
    Display name: {{ Auth::guard("admin")->user()->display_name }}
    <br>
    Unique Name: {{ Auth::guard("admin")->user()->name }}
    <br>
    Email: {{ Auth::guard("admin")->user()->email }}
    <br>
    Role: {{ Auth::guard("admin")->user()->role->name }}
    <br>
    <a href="{{ url('backend/admins') }}" class="btn-link">Admins</a>
    <form action="{{ url('backend/logout') }}" method="post">{{ csrf_field() }}<button type="submit" class="btn btn-info">Logout</button></form>
</div>
@endsection