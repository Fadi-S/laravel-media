@extends("admin.layout")

@section("content")
    <center><h1>Edit {{ $admin->display_name }}</h1></center>
    <div class="col-md-5 mx-auto">
        {!! Form::model($admin, ['method'=>'PATCH', 'url'=>'backend/admins/@'.$admin->name]) !!}
        @include("admin.admins.form")
        {!! Form::close() !!}
    </div>
@endsection