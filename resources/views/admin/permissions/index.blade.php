@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.all_permissions")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.all_permissions")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li class="active">@lang('messages.permissions')</li>
    </ol>
    <div class="card-box table-responsize">
    <table class="table data-table">
        <thead>
            <tr>
                <th>@lang('messages.name')</th>
            </tr>
        </thead>

        <tbody>
            @foreach($permissions as $group)
                @foreach($group['permissions'] as $perm)
                    <tr>
                        <td>{{ $perm }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection