@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.edit") {{ $publisher->name }}</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.edit") {{ $publisher->name }}</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/publishers") }}">@lang('messages.publishers')</a></li>
        <li><a href="{{ url(Config::get("admin")."/publishers/$publisher->slug") }}">{{ $publisher->name }}</a></li>
        <li class="active">@lang("messages.edit")</li>
    </ol>
    <div>
        {!! Form::model($publisher, ['method'=>'PATCH', 'url'=>\Config::get("admin").'/publishers/'.$publisher->slug]) !!}
        @include("admin.publishers.form")
        {!! Form::close() !!}
    </div>
@endsection