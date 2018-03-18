@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.create") @lang("messages.type")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.create") @lang("messages.type")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people") }}">@lang('messages.people')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people/types") }}">@lang('messages.types')</a></li>
        <li class="active">@lang("messages.create") @lang("messages.type")</li>
    </ol>
    <div>
        {!! Form::open(['method'=>'POST', 'url'=>\Config::get("admin").'/people/types/']) !!}
            @include("admin.peopleTypes.form")
        {!! Form::close() !!}
    </div>
@endsection