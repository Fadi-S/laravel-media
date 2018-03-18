@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.create") @lang("messages.role")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.create") @lang("messages.role")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/roles") }}">@lang('messages.roles')</a></li>
        <li class="active">@lang("messages.create") @lang("messages.role")</li>
    </ol>
    <div>
        {!! Form::open(['method'=>'POST', 'url'=>\Config::get("admin").'/roles/']) !!}
            @include("admin.roles.form")
        {!! Form::close() !!}
    </div>
@endsection