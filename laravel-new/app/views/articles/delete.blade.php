 @extends('layout')
 @section('content')
	<div class="page-header" style="border: 1px solid #0077b3;" >
		<h1>Delete  <small>Do you really want to delete this Article?</small></h1>
	</div>
<form action="" method="post" role="form">
        <input type="hidden" name="article" value="" />
        <input type="submit" class="btn btn-danger" value="Yes" />
       	<a href="" class="btn btn-default">No</a>
</form>
@stop