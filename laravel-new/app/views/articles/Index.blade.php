 @extends('layout')
 @section('content')
	<div class="page-header" style="border: 1px solid #0077b3; text-align: center">
		<h1>Articles App</h1>
 			</p>
 	</div>
				<div class="panel panel-default">
					 <div class="panel-body">
 						<a href="{{URL::route('articles.create')}}" class="btn btn-info">Add Article</a>
 				</div>
 					 </div>
  							
				<table class="table table-striped">
			<thead>
					<tr>
 							<th>Name</th>
							<th>Description</th>
							<th>URL</th>
							<th>Img_Path</th>
							<th>Status</th>
							<th>Actions</th>
					</tr>
			</thead>
<tbody>
	@foreach($articles as $article)
		<tr>
				<td><a href="{{URL::route('articles.show',array('id'=>$article->id))}}" target="_blank">{{$article->Name}}</a></td>
				<td>{{$article->Description}}</td>
				<td><a href="{{URL::to($article->URL)}}" target="_blank">{{$article->URL}}</a></td>
				<td>{{$article->Img_Path}}</td>
				<td>{{$article->Status}}</td>
				
			<td>
				<a href="{{URL::route('articles.edit',array('id'=>$article->id))}}" class="btn btn-default">Edit</a>
				<a href="{{URL::route('articles.delete',array('id'=>$article->id))}}" class="btn btn-danger">Delete</a>
				<a href="{{URL::route('articles.comment',array('id'=>$article->id))}}" @if($article->Status=='Published') class="btn btn-primary">Comment
				@endif
				</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>
	
@stop