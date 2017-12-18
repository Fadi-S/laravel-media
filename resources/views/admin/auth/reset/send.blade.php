@extends("admin.auth.layout")

@section("title")<title>@lang("messages.title") | @lang("messages.reset_password")</title>@endsection

@section("content")
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> @lang("messages.reset_password") </h3>
        </div>

        <div class="panel-body">
            <form role="form" method="POST" class="text-center" action="{{ url(\Config::get("admin").'/reset/email') }}">
                {{ csrf_field() }}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="alert alert-info">
                        @lang("messages.reset_instructions")
                    </div>
                @endif

                <div class="form-group m-b-0{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" required placeholder="@lang("messages.email")" >
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
                                @lang("messages.reset")
                            </button>
                        </span>
                    </div>
                </div>
                <br>
                @if ($errors->has('email'))
                    <span class="alert alert-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </form>
        </div>
    </div>

@endsection
