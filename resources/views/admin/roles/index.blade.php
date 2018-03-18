@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.all") @lang("messages.roles")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.all") @lang("messages.roles")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li class="active">@lang('messages.roles')</li>
    </ol>
    <a href="{{ url(\Config::get("admin")."/roles/create") }}" class="btn btn-success">@lang("messages.create") @lang("messages.role")</a>
    <button class="btn btn-danger delete_all" data-url="{{ url(Config::get("admin").'/roles/deleteAll') }}">@lang('messages.delete_selected')</button>
    <br><br>
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
            @foreach($roles as $role)
                <tr>
                    <td>
                        <div class="checkbox checkbox-circle checkbox-danger">
                            <input id="{{ $role->id }}" type="checkbox" class="sub_chk" data-id="{{$role->id}}">
                            <label for="{{ $role->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $role->name }}</td>
                    <td><a href="{{ url(\Config::get("admin")."/roles/$role->id/edit") }}" class="btn btn-info">@lang('messages.edit')</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection