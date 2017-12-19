@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.edit") {{ $role->name }}</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.edit") {{ $role->name }}</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/roles") }}">@lang('messages.roles')</a></li>
        <li class="active">@lang("messages.edit") {{ $role->name }}</li>
    </ol>
    <div>
        {!! Form::model($role, ['method'=>'PATCH', 'url'=>\Config::get("admin").'/roles/'.$role->id]) !!}
        @include("admin.roles.form")
        {!! Form::close() !!}
    </div>
@endsection