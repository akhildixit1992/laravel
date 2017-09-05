@extends('layout')
@section('content')
<div class="page-header" style="border: 1px solid #0077b3;">
	<h1>Add New Article </h1>
</div>
	
<!--<div class="alert alert-danger">
	<ul>
		@foreach( $errors->all() as $error)</p>
 		<li>{{ $error }}</li>
 		@endforeach
	</ul>
</div>-->
	
<form action="{{URL::route('articles.create')}}" method="post" role="form" enctype="multipart/form-data" files="true">
	<div class="form-group @if ($errors->has('firstName')) has-error @endif">
		<label for="firstName">Name</label>
			<input type="text" class="form-control" name="firstName" />
			 @if ($errors->has('firstName')) <p class="help-block">{{ $errors->first('firstName') }}</p> @endif
	</div>
 	<div class="form-group @if ($errors->has('description')) has-error @endif">
 		<label for="description">Description</label><br />
 			<input type="text" class="form-control" name="description" />
 			  @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
 	</div>
 	<div class="form-group @if ($errors->has('url')) has-error @endif">
 		<label for="url">URL</label><br />
			<input type="text" class="form-control" name="url" />
			  @if ($errors->has('url')) <p class="help-block">{{ $errors->first('url') }}</p> @endif
	</div>
<div class="form-group">
 		<label for="Image">Img_Path</label><br/>
			<input type="file"  name="imagePath">
	  </div>

	<div class="form-group" >
 		<label for="status">Status</label><br />
			 <select class="form-control" id="Status" name="status">
			 		<option>Select to Draft or Publish</option>
        			<option>Draft</option>
        			<option>Published</option>
      		</select>
	</div>
			<input type="submit" value="Add" class="btn btn-primary" />
			<a href="" class="btn btn-link">Cancel</a>
</form>
@stop