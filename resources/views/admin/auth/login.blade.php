@extends("admin.auth.layout")

@section("title")<title>@lang("messages.title") | @lang("messages.login")</title>@endsection

@section("content")
    <div class="card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Sign In to <strong class="text-custom">Stgtube</strong> </h3>
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" method="POST" action="{{ url(\Config::get("admin").'/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('login') ? ' has-error has-feedback' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" value="{{ old('login') }}" name="login" type="text" required="" placeholder="@lang('messages.name')">
                    </div>
                </div>

                @if(!$errors->isEmpty())
                    <div class="error">{{ $errors->first('login') }}</div>
                @endif

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="" placeholder="@lang('messages.password')">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-pink">
                            <input id="checkbox-signup" {{ (old('remember') ? "checked" : "") }} name="remember" type="checkbox">
                            <label for="checkbox-signup">
                                @lang("messages.remember")
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">@lang('messages.login')</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ url(\Config::get("admin").'/reset/send') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> @lang('messages.forgot_password')</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection