@extends("admin.layout")

@section("content")
    <center><h1>Create Admin</h1></center>
    <div class="col-md-5 mx-auto">
        {!! Form::open(['method'=>'POST', 'url'=>\Config::get("admin").'/admins/']) !!}
            @include("admin.admins.form")
        {!! Form::close() !!}
    </div>
@endsection