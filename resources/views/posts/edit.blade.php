@extends("main")

@section("title", "| Edit Post")

@section("content")
	
	<div class="row">
		{!! Form::model($post, array("route" => array("posts.update", $post->id))) !!}
		<div class="col-md-8">
			{{ Form::label("title", "Title:") }}
			{{ Form::text("title", null, array("class" => "form-control input-lg")) }}
	
			{{ Form::label("body", "Body:", array("class" => "form-spacing-top")) }}
			{{ Form::textarea("body", null, array("class" => "form-control")) }}
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
				  <dt>Created at:</dt>
				  <dd>{{ date("d M, Y H:i:s",strtotime($post->created_at)) }}</dd>
				</dl> 
				
				<dl class="dl-horizontal">
				  <dt>Last Updated:</dt>
				  <dd>{{ date("d M, Y H:i:s",strtotime($post->updated_at)) }}</dd>
				</dl>
				
				<hr>
				
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute("posts.show", "Cancel", array($post->id), array("class" => "btn btn-danger btn-block")) !!}
					</div>
					
					<div class="col-sm-6">
						{!! Html::linkRoute("posts.update", "Save Changes", array($post->id), array("class" => "btn btn-success btn-block")) !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div> <!-- end of the .row  -->
	

@stop
