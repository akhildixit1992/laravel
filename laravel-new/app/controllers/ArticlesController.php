<?php



class ArticlesController extends \BaseController {


	public function index()
	{
		$articles = Article::orderBy('updated_at','desc')->get();
		//$user=Article::orderBy('id','desc')->first();
		$comments=Comment::all();
        return View::make('articles.Index', compact('articles','comments'));
	}

	public function create()
	{
		return View::make('articles.create');
	}

	public function show($id)
	{
		$showarticle=Article::findOrFail($id);
		$comments=Comment::all();
		return View::make('articles.show',compact('showarticle','comments'));	
	}
	public function edit($id)
	{
	
	    $getarticle=Article::findOrFail($id);
	    $getstatus=Article::select('Status')->where('id',$id)->get();
		return View::make('articles.edit', compact('getarticle','getstatus'));

	}
	
	public function delete($id)
	{
		$delarticle=Article::findOrFail($id);
		return View::make('articles.delete', compact('delarticle'));
	}
    
    public function comment($id)
    {
    	$commarticle=Article::findOrFail($id);
		return View::make('articles.comment', compact('commarticle'));
    }

     public function handleCreate()
     {
     	
 			$input = Input::except('imagePath');
 			$response =  Article::add($input);
 			if(is_int($response))
 			{
 				return Redirect::action('ArticlesController@Index');
 			}
 			if($response->fails())
 			{
 				return Redirect::action('ArticlesController@create')->withErrors($response);
 			}
 			
     }

 public function handleEdit($id)
  { 
  		   $input = Input::except('imagePath');
 		   $response =  Article::updateArticle($id,$input);
  
         if(is_int($response))
 			{
 				return Redirect::action('ArticlesController@Index');
 			}
 			if($response->fails())
 			{
 				return Redirect::back()->withErrors($response);
 			}
 			
    
}
 public function handleDelete($id)
  {
           // Handle the delete confirmation.
    $response=Article::deleteArticle($id);
    if(is_int($response))
    {
 		return Redirect::action('ArticlesController@Index');

 	}

  }
 
 public function handleComment($id)
 {
 	$input=Input::all();
 	$response=Article::commentArticle($id,$input);
 	if(is_int($response))
 	{
 	return Redirect::action('ArticlesController@Index');
 	}
 	if($response->fails())
 			{
 				return Redirect::back()->withErrors($response);
 			}
 }


}
