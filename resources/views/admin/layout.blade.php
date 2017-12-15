<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" crossorigin="anonymous">
<title>{{ $title }}</title>

<style>
    label {
        font-weight: bold;
    }
    h1{
        text-decoration: underline;
        text-align: center;
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
<div class="container">
    @yield("content")
</div>
