@extends("admin.layout")

@section("content")
    Name: {{ $admin->name }}
    <br>
    Slug: {{ $admin->slug }}
    <br>
    Email: {{ $admin->email }}
    <br>
    Role: {{ $admin->role->name }}
    <br>
    <a href="{{ url(\Config::get("admin")."/admins/$admin->slug/edit") }}" class="btn btn-info">Edit</a>
    <br>
    <a href="{{ url(\Config::get("admin")."/admins/$admin->slug/delete") }}" class="btn btn-danger">Delete</a>
@endsection