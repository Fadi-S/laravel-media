@extends("admin.layout")

@section("content")
    Display name: {{ $admin->display_name }}
    <br>
    Unique Name: {{ $admin->name }}
    <br>
    Email: {{ $admin->email }}
    <br>
    Role: {{ $admin->role->name }}
    <br>
    <a href="{{ url("backend/admins/@$admin->name/edit") }}" class="btn btn-info">Edit</a>
    <br>
    <a href="{{ url("backend/admins/@$admin->name/delete") }}" class="btn btn-danger">Delete</a>
@endsection