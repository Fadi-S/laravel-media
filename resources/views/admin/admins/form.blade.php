<div class="form-group">
    {!! Form::label("display_name", "Display Name *") !!}
    {!! Form::text("display_name", null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label("name", "Unique Name *") !!}
    {!! Form::text("name", null, ['class'=>'form-control', "required"]) !!}
</div>

<div class="form-group">
    {!! Form::label("email", "E-mail *") !!}
    {!! Form::email("email", null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label("phone", "Phone *") !!}
    {!! Form::text("phone", null, ['class'=>'form-control', "required"]) !!}
</div>

<div class="form-group">
    {!! Form::label("password", "Password *") !!}
    {!! Form::password("password", ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("role_id", "Role") !!}
    {!! Form::select("role_id", $roles, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <center>{!! Form::submit("Submit", ['class'=>'btn btn-success']) !!}</center>
</div>