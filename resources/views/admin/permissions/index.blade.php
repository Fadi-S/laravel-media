@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.all_permissions")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.all_permissions")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li class="active">@lang('messages.permissions')</li>
    </ol>
    <a href="{{ url(\Config::get("admin")."/permissions/create") }}" class="btn btn-success">@lang('messages.create_permission')</a>
    <button class="btn btn-danger delete_all" data-url="{{ url(Config::get("admin").'/permissions/deleteAll') }}">@lang('messages.delete_selected')</button>
    <br><br>
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
            @foreach($permissions as $perm)
                <tr>
                    <td>
                        <div class="checkbox checkbox-circle checkbox-danger">
                            <input id="{{ $perm->id }}" type="checkbox" class="sub_chk" data-id="{{$perm->id}}">
                            <label for="{{ $perm->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $perm->name }}</td>
                    <td><a href="{{ url(\Config::get("admin")."/permissions/$perm->id/edit") }}" class="btn btn-info">@lang('messages.edit')</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection