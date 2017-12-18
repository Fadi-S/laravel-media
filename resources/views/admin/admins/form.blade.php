<div class="form-group {{ ($errors->has("name")) ? " has-error" : "" }}">
    {!! Form::label("name", __("messages.name")." *") !!}
    {!! Form::text("name", null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group {{ ($errors->has("email")) ? " has-error" : "" }}">
    {!! Form::label("email", __("messages.email")." *") !!}
    {!! Form::email("email", null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group {{ ($errors->has("phone")) ? " has-error" : "" }}">
    {!! Form::label("phone", __("messages.phone")." *") !!}
    {!! Form::text("phone", null, ['class'=>'form-control', "required"]) !!}
</div>
@if($create)
    <div class="form-group {{ ($errors->has("password")) ? " has-error" : "" }}">
        {!! Form::label("password", __("messages.password")." *") !!}
        {!! Form::password("password", ['class'=>'form-control']) !!}
    </div>
@endif

<div class="form-group {{ ($errors->has("role_id")) ? " has-error" : "" }}">
    {!! Form::label("role_id", __("messages.role")." *") !!}
    {!! Form::select("role_id", $roles, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <div class="checkbox checkbox-{{ ($errors->has("active")) ? "danger" : "success" }}">
        {!! Form::hidden("active", 0) !!}
        {!! Form::checkbox("active", "1", ($create) ? true : null) !!}
        {!! Form::label("active", __("messages.active")) !!}
    </div>
</div>

<div class="form-group">
    <center>{!! Form::submit(__("messages.submit"), ['class'=>'btn btn-success']) !!}</center>
</div>

@include("admin.errors.list")