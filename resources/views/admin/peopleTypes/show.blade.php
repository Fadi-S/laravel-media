@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | {{ $type->name }}</title>@endsection

@section("content")
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people") }}">@lang('messages.people')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people/types") }}">@lang('messages.types')</a></li>
        <li class="active">{{ $type->name }}</li>
    </ol>
    <div class="row">

    </div>
@endsection