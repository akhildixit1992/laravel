@extends('layout')
@section('content')
<div class="page-header" style="border: 1px solid #0077b3;">
	<h1>Show Article </h1>
	
</div>
 <fieldset disabled="disabled">
	<form>
     <input type="hidden" name="id" value="">
		<div class="form-group">
                  <label for="Name">Name</label>
                  <br>
                {{$showarticle->Name}}
        </div>
 		<div class="form-group">
                 <label for="Description">Description</label>
                 <br>
                 {{$showarticle->Description}}
       	 </div>
		 <div class="form-group">
                  <label for="URL">URL</label>
                  <br>
                  {{$showarticle->URL}}
         </div>
         <div class="form-group">
                  <label for="Img_Path">Image</label><br> 
                  <img src="{{$showarticle->Img_Path}}" width="100" height="100" />
         </div>
        
         <div class="form-group">
         @if($showarticle->Status=='Published')
         <label for="Comments">Comments</label>
         @else
         <label for="Comments" id="visible">Comments</label>
         <style type="text/css">
           #visible {
            display:none;
            visibility:hidden;
           }
         </style>
         @endif
         @foreach($comments as $comment)
                    @if($comment->article_id==$showarticle->id)
                          @if($showarticle->Status=='Published')
                          <ul class="list-group">
                          <li class="list-group-item disabled">{{$comment->comments}}</li>
                          </ul>
                           @endif
                    @endif
                  @endforeach  
         </div>
         <div class="form-group">
                  <label for="Status">Status</label>
                  <br>
                  {{$showarticle->Status}}
         </div>
         <fieldset>
     </form>
     @stop
