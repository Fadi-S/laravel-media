@extends("admin.layout")

@section("content")
    <style>
        tr {
          cursor: pointer;
        }
    </style>
    <center><h1>All Admins</h1></center>
    <a href="{{ url(\Config::get("admin")."/admins/create") }}" class="btn btn-success">Create Admin</a>
    <br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($admins as $admin)
                <tr onclick="window.location.href='{{ url(\Config::get("admin")."/admins/$admin->slug/") }}'">
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td><a href="{{ url(\Config::get("admin")."/admins/$admin->slug/edit") }}" class="btn btn-info">Edit</a></td>
                    <td><a></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection