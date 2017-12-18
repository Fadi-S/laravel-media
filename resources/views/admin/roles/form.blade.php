<div class="form-group {{ ($errors->has("name")) ? " has-error" : "" }}">
    {!! Form::label("name", __("messages.name")." *") !!}
    {!! Form::text("name", null, ['class'=>'form-control', 'required']) !!}
</div>

<div class="form-group {{ ($errors->has("perms")) ? " has-error" : "" }}">
    {!! Form::label("permissions", __("messages.permissions")) !!}
    {!! Form::select("permissions[]", $permissions, null, ['multiple'=>"multiple", 'class'=>"multi-select", 'data-plugin'=>"multiselect"]) !!}
</div>

<div class="form-group">
    <center>{!! Form::submit(__("messages.submit"), ['class'=>'btn btn-success']) !!}</center>
</div>

@include("admin.errors.list")