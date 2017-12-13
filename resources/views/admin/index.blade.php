<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<title>Stgtube | {{ Auth::guard("admin")->user()->display_name }}</title>
<div class="container">
    Display name: {{ Auth::guard("admin")->user()->display_name }}
    <br>
    Name: {{ Auth::guard("admin")->user()->name }}
    <form action="{{ url('admin/logout') }}" method="post">{{ csrf_field() }}<button type="submit" class="btn btn-info">Logout</button></form>
</div>
