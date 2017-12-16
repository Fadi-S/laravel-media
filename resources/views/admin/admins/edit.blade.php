@extends("admin.layout")

@section("content")
    <center><h1>Edit {{ $admin->name }}</h1></center>
    <div class="col-md-5 mx-auto">
        {!! Form::model($admin, ['method'=>'PATCH', 'url'=>\Config::get("admin").'/admins/'.$admin->slug]) !!}
        @include("admin.admins.form")
        {!! Form::close() !!}
    </div>
@endsection