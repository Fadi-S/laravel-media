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
                        <p class="text-muted font-13"><strong>@lang("messages.name") :</strong> <span
                                    class="m-l-15">{{ $admin->name }}</span></p>

                        <p class="text-muted font-13"><strong>@lang("messages.phone") :</strong><span
                                    class="m-l-15">{{ $admin->phone }}</span></p>

                        <p class="text-muted font-13"><strong>@lang("messages.email") :</strong> <span
                                    class="m-l-15">{{ $admin->email }}</span></p>

                        <p class="text-muted font-13"><strong>@lang("messages.active") :</strong>
                            <span class="m-l-15">
                                <span class="fa fa-thumbs-o-{{ ($admin->active) ? "up" : "down" }}"
                                      style="font-size:25px;color:{{ ($admin->active) ? "green" : "red" }};"></span>
                            </span>
                        </p>

                        <p class="text-muted font-13"><a
                                    href="{{ url(Config::get("admin")."/admins/$admin->slug/edit") }}"
                                    class="btn btn-info">@lang("messages.edit")</a>
                            @if($admin == Auth::guard("admin")->user())
                                <button type="button" data-toggle="modal" data-target="#con-close-modal"
                                        class="btn btn-purple waves-effect waves-light">@lang("messages.edit") @lang("messages.photo")</button>
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title">@lang("messages.edit") @lang("messages.photo")</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data"
                                              action="{{ url(Config::get("admin")."/admins/$admin->slug/picture") }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div>
                                                    <center>
                                                        <img id="img-preview" src="{{ $admin->picture() }}"
                                                             name="picture" class="preview img-rounded"
                                                             alt="picture-preview">
                                                    </center>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="modal-footer">
                                                <center>
                                                    <div class="form-group">
                                                        <input required data-target="#img-preview" accept="image/*"
                                                               data-toggle="preview" name="picture" id="picture"
                                                               type="file" class="filestyle"
                                                               data-iconname="fa fa-cloud-upload">
                                                    </div>
                                                    <button type="button" class="btn btn-warning waves-effect"
                                                            data-dismiss="modal">@lang("messages.close")</button>
                                                    <a href="{{ url(Config::get("admin")."/admins/$admin->slug/picture") }}"
                                                       class="btn btn-danger waves-effect">@lang("messages.delete")</a>
                                                    <button id="submitForm" type="submit"
                                                            class="btn btn-success waves-effect waves-light">@lang("messages.submit")</button>
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("footer")
    <script>
        $("#submitForm").on("click", function (e) {
            var input = document.getElementById("picture");
            if (!input.files || !input.files[0]) {
                e.preventDefault();
                e.stopPropagation();
                $(".bootstrap-filestyle").addClass("has-error");
            }
        });
    </script>
@endsection