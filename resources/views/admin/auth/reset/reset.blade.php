<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<title>Stgtube Admin Reset Password</title>
<style>
    .form-label {
        font-weight: bold;
    }
    h1{
        text-decoration: underline;
    }
    .help-block{
        color: #c41313;
    }
    .error:focus, .error {
        border-color: rgba(229, 3, 0, 0.8)!important;
        box-shadow: 0 1px 1px rgba(229, 103, 23, 0.075) inset, 0 0 8px rgba(196, 20, 19, 0.79)!important;
        outline: 0 none;
    }
</style>
<div class="container">
    <center>
        <h1>Change Password</h1>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('admin/reset/change') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 form-label">E-Mail</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' error' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="form-label">New Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' error' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password" class="form-label">Confirm New Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">
                            Change Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
