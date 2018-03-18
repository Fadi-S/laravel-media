@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.people")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.type") @lang("messages.people")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/people") }}">@lang('messages.people')</a></li>
        <li class="active">@lang('messages.types')</li>
    </ol>
    <a href="{{ url(\Config::get("admin")."/people/types/create") }}" class="btn btn-success">@lang("messages.create") @lang('messages.type')</a>
    <button class="btn btn-danger delete_all" data-url="{{ url(Config::get("admin").'/people/types/deleteAll') }}">@lang('messages.delete_selected')</button>
    <br><br>
    {{ $types->links() }}
    <div class="card-box table-responsize">
    <table class="table data-table">
        <thead>
            <tr>
                <th>
                    <div class="checkbox checkbox-danger">
                        <input type="checkbox" id="master">
                        <label for="master"></label>
                    </div>
                </th>
                <th>@lang('messages.name')</th>
                <th>@lang('messages.edit')</th>
            </tr>
        </thead>

        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>
                        <div class="checkbox checkbox-circle checkbox-danger">
                            <input id="{{ $type->id }}" type="checkbox" class="sub_chk" data-id="{{$type->id}}">
                            <label for="{{ $type->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $type->name }}</td>
                    <td><a href="{{ url(\Config::get("admin")."/people/types/$type->slug/edit") }}" class="btn btn-info">@lang('messages.edit')</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{ $types->links() }}
@endsection
