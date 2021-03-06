@extends("main")

@section("title", "| Edit Post")

@section("stylesheets")
	{!! Html::style("css/select2.min.css") !!}
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	
	<script>
		tinymce.init({
			selector: "textarea",
			plugins: "link",
			menubar: false
		});
	</script>
@endsection


@section("content")
	
	<div class="row">
		{!! Form::model($post, array("route" => array("posts.update", $post->id), "method" => "PUT")) !!}
		<div class="col-md-8">
			{{ Form::label("title", "Title:") }}
			{{ Form::text("title", null, array("class" => "form-control input-lg")) }}
			
			{{ Form::label("slug", "Slug:", array("class" => "form-spacing-top")) }}
			{{ Form::text("slug", null, array("class" => "form-control")) }}
			
			{{ Form::label("category_id", "Category:", array("class" => "form-spacing-top")) }}
			{{ Form::select("category_id", $categories, null, array("class" => "form-control ")) }}
			
			{{ Form::label("tags", "Tags:", array("class" => "form-spacing-top")) }}
			{{ Form::select("tags[]", $tags, null, array("class" => "form-control select2-multi", "multiple" => "multiple")) }}
	
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
						{{ Form::submit("Save Changes", array("class" => "btn btn-success btn-block")) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div> <!-- end of the .row  -->
	

@stop

@section("scripts")
	{!! Html::script("js/select2.min.js") !!}
	
	<script type="text/javascript">
		$(".select2-multi").select2();
		$(".select2-multi").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger("change");
	</script>
@endsection
