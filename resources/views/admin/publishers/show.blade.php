@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | {{ $publisher->name }}</title>@endsection

@section("content")
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/publishers") }}">@lang('messages.publishers')</a></li>
        <li class="active">{{ $publisher->name }}</li>
    </ol>
    <div class="row">

    </div>
@endsection