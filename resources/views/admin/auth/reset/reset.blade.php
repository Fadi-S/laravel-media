@extends("admin.auth.layout")

@section("title")<title>Stgtube Backend | Reset Password</title>@endsection

@section("content")
    <div class="card-box">
        <div class="panel-heading">
            <h3 class="text-center"> @lang("messages.change_pass") </h3>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" method="POST" action="{{ url(\Config::get("admin").'/reset/change') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" value="{{ old('email') }}" name="email" type="email" required="" placeholder="@lang('messages.email')">
                    </div>
                </div>

                @if(!$errors->isEmpty())
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif

                <div class="form-group{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="" placeholder="@lang('messages.password')">
                    </div>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password_confirmation" type="password" required="" placeholder="@lang("messages.confirm_pass")">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">@lang("messages.change_pass")</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
