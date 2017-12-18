@extends("admin.layouts.master")

@section("title")<title>@lang("messages.title") | {{ $admin->name }}</title>@endsection

@section("content")
    <h4 class="page-title">@lang("messages.someone_profile", ['name' => $admin->name])</h4>
    <ol class="breadcrumb">
        <li><a href="{{ url(Config::get("admin")."/") }}">@lang('messages.dashboard')</a></li>
        <li><a href="{{ url(Config::get("admin")."/admins") }}">@lang('messages.admins')</a></li>
        <li class="active">{{ $admin->name }}</li>
    </ol>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="profile-detail card-box">
                <div>
                    <img src="{{ $admin->picture() }}" class="img-circle" alt="profile-image">
                    <div class="text-left">
                        <p class="text-muted font-13"><strong>@lang("messages.name") :</strong> <span class="m-l-15">{{ $admin->name }}</span></p>

                        <p class="text-muted font-13"><strong>@lang("messages.phone") :</strong><span class="m-l-15">{{ $admin->phone }}</span></p>

                        <p class="text-muted font-13"><strong>@lang("messages.email") :</strong> <span class="m-l-15">{{ $admin->email }}</span></p>

                        <p class="text-muted font-13"><a href="{{ url(Config::get("admin")."/admins/$admin->slug/edit") }}" class="btn btn-info">@lang("messages.edit")</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection