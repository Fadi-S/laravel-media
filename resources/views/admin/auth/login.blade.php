<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<title>Stgtube Backend Login</title>
<style>
    .form-label {
        font-weight: bold;
    }
    h1{
        text-decoration: underline;
    }
    .error{
        font-weight: bold;
        color: #c41313;
    }
    .type-error:focus, .type-error {
        border-color: rgba(229, 3, 0, 0.8)!important;
        box-shadow: 0 1px 1px rgba(229, 103, 23, 0.075) inset, 0 0 8px rgba(196, 20, 19, 0.79)!important;
        outline: 0 none;
    }
</style>
<br>
<div class="container">
    <center><h1>Login</h1></center>
    <br>
    <form action="{{ url('backend/login') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-4 mx-auto">
            <label for="login" class="form-label">Name: </label>
                <input name="login" value="{{ old('login') }}" type="text" class="form-control">

            <br>
            <label for="password" class="form-label">Password: </label>
            <input name="password" type="password" class="form-control">
            <br>
            <center>
                @if(!$errors->isEmpty())
                <div class="error">{{ $errors->first('login') }}</div>
                <br>
                @endif
                <label class="checkbox"><input {{ (old('remember') ? "checked" : "") }} name="remember" type="checkbox"> Remember Me</label>
            <br>
                <button class="btn btn-success" type="submit">
                    Login
                </button>
                <br><br>
                <a href="{{ url('backend/reset/send') }}" class="btn-link">Forgot Your Password?</a>
            </center>
        </div>

    </form>
</div>