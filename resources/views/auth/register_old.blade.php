@extends("main")

@section("title", "| Login")

@section("content")
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open !!}
				{{ Form::label("name", "Name:") }}
				{{ Form::email("name"), null, array("class" => "form-control") }}
			
				{{ Form::label("email", "Email:") }}
				{{ Form::email("email"), null, array("class" => "form-control") }}
				
				{{ Form::label("password", "Password:") }}
				{{ Form::passqord("password", array("class" => "form-control")) }}
				
				{{ Form::label("password_confirmation", "Confirm Password::") }}
				{{ Form::email("password_confirmation"), array("class" => "form-control") }}
				
				{!! Form:sumbit("Register", array("classs" => "btn tbn-primary btn-block form-spacing-top")) !!}
			
			{!! Form::close !!}
		</div>
	</div>
	

@stop
