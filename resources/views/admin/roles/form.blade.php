<div class="form-group {{ ($errors->has("name")) ? " has-error" : "" }}">
	{!! Form::label("name", __("messages.name")." *") !!}
	{!! Form::text("name", null, ['class'=>'form-control', 'required']) !!}
</div>

<style type="text/css">
	.card-box {
		position: relative;
		border-radius: 15px;
		margin-bottom: 25px;
		display: block;
	}
	.title {
		background-color: rgba(169, 169, 169, 0.65);
		position: absolute;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;
		width: 100%;
		height: 25%;
		left: 0;
		top: 0;
		color: white;
		font-weight: bold;
	}
</style>

<div class="form-group {{ ($errors->has("perms")) ? " has-error" : "" }}">
	{!! Form::label("permissions", __("messages.permissions")) !!}
	<br>
	<center>
		<div>
			@foreach($permissions as $name => $group)
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
					<div class="card-box">
						<div class="title">{{ $name }}</div>
						@foreach($group["permissions"] as $name => $id)
							<div class="checkbox checkbox-success">
								<input name="permissions[]" type="checkbox" id="{{ $id }}">
								<label for="permissions[]">{{ $name }}</label>
							</div>
						@endforeach
					</div>
				</div>
				<br><br><br><br><br><br><br>
			@endforeach
		</div>
	</center>
</div>

<div class="form-group">
	<center>{!! Form::submit(__("messages.submit"), ['class'=>'btn btn-success']) !!}</center>
</div>

@include("admin.errors.list")