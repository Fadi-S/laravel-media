@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.all_admins")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.all_admins")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li class="active">@lang('messages.admins')</li>
    </ol>
    <a href="{{ url(\Config::get("admin")."/admins/create") }}" class="btn btn-success">@lang('messages.create_admin')</a>
    <button class="btn btn-danger delete_all" data-url="{{ url(Config::get("admin").'/admins/deleteAll') }}">@lang('messages.delete_selected')</button>
    <br><br>
    {{ $admins->links() }}
    <table class="table data-table table-hover">
        <thead>
            <tr>
                <th>
                    <div class="checkbox checkbox-danger">
                        <input type="checkbox" id="master">
                        <label for="master"></label>
                    </div>
                </th>
                <th>@lang("messages.photo")</th>
                <th>@lang('messages.name')</th>
                <th>@lang('messages.email')</th>
                <th>@lang('messages.phone')</th>
                <th>@lang('messages.active')</th>
                <th>@lang('messages.edit')</th>
            </tr>
        </thead>

        <tbody>
            @foreach($admins as $admin)
                <tr style="cursor:pointer;" onclick="window.location.href='{{ url(\Config::get("admin")."/admins/$admin->slug/") }}'">
                    <td onclick="event.stopPropagation();">
                        <div class="checkbox checkbox-circle checkbox-danger">
                            <input id="{{ $admin->id }}" type="checkbox" class="sub_chk" data-id="{{$admin->id}}">
                            <label for="{{ $admin->id }}"></label>
                        </div>
                    </td>
                    <td><img src="{{ $admin->picture() }}" class="thumb-md img-circle"></td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td><span class="fa fa-thumbs-o-{{ ($admin->active) ? "up" : "down" }}" style="font-size:20px;color:{{ ($admin->active) ? "green" : "red" }};"></span></td>
                    <td><a href="{{ url(\Config::get("admin")."/admins/$admin->slug/edit") }}" class="btn btn-info">@lang('messages.edit')</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $admins->links() }}
@endsection
