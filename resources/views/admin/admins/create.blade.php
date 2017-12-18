@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.create_admin")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.create_admin")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/admins") }}">@lang('messages.admins')</a></li>
        <li class="active">@lang("messages.create_admin")</li>
    </ol>
    <div>
        {!! Form::open(['method'=>'POST', 'url'=>\Config::get("admin").'/admins/']) !!}
            @include("admin.admins.form")
        {!! Form::close() !!}
    </div>
@endsection