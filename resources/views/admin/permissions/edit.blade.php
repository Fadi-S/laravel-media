@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | Edit {{ $permission->name }}</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.edit") {{ $permission->name }}</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/permissions") }}">@lang('messages.permissions')</a></li>
        <li class="active">@lang("messages.edit") {{ $permission->name }}</li>
    </ol>
    <div>
        {!! Form::model($permission, ['method'=>'PATCH', 'url'=>\Config::get("admin").'/permissions/'.$permission->id]) !!}
        @include("admin.permissions.form")
        {!! Form::close() !!}
    </div>
@endsection