@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.edit") {{ $admin->name }}</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.edit") {{ $admin->name }}</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/admins") }}">@lang('messages.admins')</a></li>
        <li><a href="{{ url(Config::get("admin")."/admins/$admin->slug") }}">{{ $admin->name }}</a></li>
        <li class="active">@lang("messages.edit")</li>
    </ol>
    <div>
        {!! Form::model($admin, ['method'=>'PATCH', 'url'=>\Config::get("admin").'/admins/'.$admin->slug]) !!}
        @include("admin.admins.form")
        {!! Form::close() !!}
    </div>
@endsection