 @extends('layout')
 @section('content')
	<div class="page-header" style="border: 1px solid #0077b3;" >
		<h1>Upload a Image</h1>
	</div>
     <form action ="{{URL::to('upload')}}" method="post" enctype="multipart/form-data" files="true">
     	<input type="file" name="image">
     	<br>
     	<input type="submit"  class="btn btn-danger" value="Upload">
	</form>
@stop