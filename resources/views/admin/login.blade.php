<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<title>Stgtube Admin Login</title>
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
</style>
<br>
<div class="container">
    <center><h1>Login</h1></center>
    <br>
    <form action="{{ url('admin/login') }}" method="post">
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
                <br>
            </center>
        </div>

    </form>
</div>