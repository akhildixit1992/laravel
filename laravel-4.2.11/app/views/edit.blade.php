@extends('layout')
 @section('content')
<div class="page-header" style="border: 1px solid #0077b3;">
	<h1>Edit Article </h1> 
</div>
	<form action="{{route('edit',$getarticle->id)}}" method="post" role="form" enctype="multipart/form-data" files="true">
          <input type="hidden" name="id" value="">
		<div class="form-group @if ($errors->has('firstName')) has-error @endif">
                  <label for="firstName">Name</label>
                <input type="text" class="form-control" name="firstName" value="{{$getarticle->Name}}" />
                  @if ($errors->has('firstName')) <p class="help-block">{{ $errors->first('firstName') }}</p> @endif
        </div>
 		<div class="form-group @if ($errors->has('description')) has-error @endif">
                 <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" value="{{$getarticle->Description}}" />
                  @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
       	 </div>
		 <div class="form-group @if ($errors->has('url')) has-error @endif">
                  <label for="url">URL</label>
                  <input type="text" class="form-control" name="url" value="{{$getarticle->URL}}" />
                  @if ($errors->has('url')) <p class="help-block">{{ $errors->first('url') }}</p> @endif
         </div>
         <div class="form-group">
                  <label for="Img_Path">Image</label><br>
              <!--    <input type="text" class="form-control" name="Img_Path" value="{{$getarticle->Img_Path}}"/>-->
             <!-- <img src="{{$getarticle->Img_Path}}" width="100" height="100"/>-->
              <input type="file"  name="Img">

         </div>
         <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="Status" name="status">
                    @foreach($getstatus as $status)
                      <option>{{ $status-> Status}}</option> 
                      @if($status->Status=='Draft')
                      <option>Published</option>
                      @else
                      <option>Draft</option>
                      @endif              
                  @endforeach
                  </select>
         </div>
                   <input type="submit" value="Save" class="btn btn-primary" />
                  <a href="" class="btn btn-link">Cancel</a>
     </form>
@stop

