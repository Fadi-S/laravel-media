@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | @lang("messages.publishers")</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.publishers")</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li class="active">@lang('messages.publishers')</li>
    </ol>
    <a href="{{ url(\Config::get("admin")."/publishers/create") }}" class="btn btn-success">@lang('messages.create_publisher')</a>
    <button class="btn btn-danger delete_all" data-url="{{ url(Config::get("admin").'/publishers/deleteAll') }}">@lang('messages.delete_selected')</button>
    <br><br>
    {{ $publishers->links() }}
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
            @foreach($publishers as $publisher)
                <tr>
                    <td>
                        <div class="checkbox checkbox-circle checkbox-danger">
                            <input id="{{ $publisher->id }}" type="checkbox" class="sub_chk" data-id="{{$publisher->id}}">
                            <label for="{{ $publisher->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $publisher->name }}</td>
                    <td><a href="{{ url(\Config::get("admin")."/publishers/$publisher->slug/edit") }}" class="btn btn-info">@lang('messages.edit')</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{ $publishers->links() }}
@endsection
