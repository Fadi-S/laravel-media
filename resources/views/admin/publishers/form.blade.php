<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="form-group {{ ($errors->has("name")) ? " has-error" : "" }}">
                {!! Form::label("name", __("messages.name")." *") !!}
                {!! Form::text("name", null, ['class'=>'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                <center>{!! Form::submit(__("messages.submit"), ['class'=>'btn btn-success']) !!}</center>
            </div>
        </div>
    </div>
</div>

@include("admin.errors.list")