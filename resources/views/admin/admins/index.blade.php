@extends("admin.layout")

@section("content")
    <style>
        tr {
          cursor: pointer;
        }
    </style>
    <center><h1>All Admins</h1></center>
    <a href="{{ url("backend/admins/create") }}" class="btn btn-success">Create Admin</a>
    <br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Display Name</th>
                <th>Unique Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
            @foreach($admins as $admin)
                <tr onclick="window.location.href='{{ url("backend/admins/@$admin->name/") }}'">
                    <td>{{ $admin->display_name }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td>{{ $admin->role->name }}</td>
                    <td><a href="{{ url("backend/admins/@$admin->name/edit") }}" class="btn btn-info">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection