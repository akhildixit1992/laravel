@extends('layout')
@section('content')
<div class="page-header" style="border: 1px solid #0077b3;">
	<h1>Leave a Comment!</h1>
</div>
<form action="{{route('comment',$commarticle->id)}}" method="POST">
	<input type="hidden" name="post_id" value="" />	
	
	<div class="form-group">
		<label for="comment_content">Message</label> <br/>
		<textarea cols="60" rows="6" name="comment_content"></textarea>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="Submit" />
	</div>

</form>
@stop