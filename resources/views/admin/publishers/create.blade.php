@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.create_publisher")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.create_publisher")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/publishers") }}">@lang('messages.publishers')</a></li>
        <li class="active">@lang("messages.create_publisher")</li>
    </ol>
    <div>
        {!! Form::open(['method'=>'POST', 'url'=>\Config::get("admin").'/publishers/']) !!}
            @include("admin.publishers.form")
        {!! Form::close() !!}
    </div>
@endsection