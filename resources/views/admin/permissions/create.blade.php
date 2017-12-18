@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.create_permission")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.create_permission")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/permissions") }}">@lang('messages.permissions')</a></li>
        <li class="active">@lang("messages.create_permission")</li>
    </ol>
    <div>
        {!! Form::open(['method'=>'POST', 'url'=>\Config::get("admin").'/permissions/']) !!}
            @include("admin.permissions.form")
        {!! Form::close() !!}
    </div>
@endsection