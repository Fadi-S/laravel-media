@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.edit") {{ $type->name }}</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.edit") {{ $type->name }}</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people") }}">@lang('messages.people')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people/types") }}">@lang('messages.types')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people/types/$type->slug") }}">{{ $type->name }}</a></li>
        <li class="active">@lang("messages.edit")</li>
    </ol>
    <div>
        {!! Form::model($type, ['method'=>'PATCH', 'url'=>\Config::get("admin").'/people/types/'.$type->slug]) !!}
        @include("admin.peopleTypes.form")
        {!! Form::close() !!}
    </div>
@endsection