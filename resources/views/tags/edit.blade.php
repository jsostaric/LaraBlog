@extends("main")

@section("title", "| Edit Tag")

@section("content")
	
	{!! Form::model($tag, array("route" => array("tags.update", $tag->id), "method" => "put")) !!}
		{{ Form::label("name", "Title:") }}
		{{ Form::text("name", null, array("class" => "form-control")) }}
		
		{!! Form::submit("Save Changes", array("class" => "btn btn-success btn-spacing-top")) !!}
	{!! Form::close() !!}

@endsection
