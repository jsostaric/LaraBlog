@extends("main")

@section("title", "| Login")

@section("content")
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open !!}
				{{ Form::label("email", "Email:") }}
				{{ Form::email("email"), null, array("class" => "form-control") }}
				
				{{ Form::label("password", "Password:") }}
				{{ Form::passqord("password", null, array("class" => "form-control")) }}
				
				{{ Form:checkbox("remember") }}{{ From::label("remember", "Remember me:") }}
				
				{!! Form:sumbit("Login") !!}
			
			{!! Form::close !!}
		</div>
	</div>
	

@stop
