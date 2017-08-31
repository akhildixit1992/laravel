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
	
<form action="{{URL::to('create')}}" method="post" role="form" enctype="multipart/form-data" files="true">
	<div class="form-group @if ($errors->has('Name')) has-error @endif">
		<label for="Name">Name</label>
			<input type="text" class="form-control" name="Name" />
			 @if ($errors->has('Name')) <p class="help-block">{{ $errors->first('Name') }}</p> @endif
	</div>
 	<div class="form-group @if ($errors->has('Description')) has-error @endif">
 		<label for="Description">Description</label><br />
 			<input type="text" class="form-control" name="Description" />
 			  @if ($errors->has('Description')) <p class="help-block">{{ $errors->first('Description') }}</p> @endif
 	</div>
 	<div class="form-group @if ($errors->has('url')) has-error @endif">
 		<label for="URL">URL</label><br />
			<input type="text" class="form-control" name="url" />
			  @if ($errors->has('url')) <p class="help-block">{{ $errors->first('url') }}</p> @endif
	</div>
<div class="form-group">
 		<label for="Image">Img_Path</label><br/>
			<input type="file"  name="Img_Path">
	  </div>

	<div class="form-group >
 		<label for="Status">Status</label><br />
			 <select class="form-control" id="Status" name="Status">
			 		<option>Select to Draft or Publish</option>
        			<option>Draft</option>
        			<option>Published</option>
      		</select>
	</div>
			<input type="submit" value="Add" class="btn btn-primary" />
			<a href="" class="btn btn-link">Cancel</a>
</form>
@stop