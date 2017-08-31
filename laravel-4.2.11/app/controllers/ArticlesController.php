<?php



class ArticlesController extends \BaseController {


	public function index()
	{
		$articles = Article::orderBy('updated_at','desc')->get();
		//$user=Article::orderBy('id','desc')->first();
		$comments=Comment::all();
        return View::make('Index', compact('articles','comments'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$showarticle=Article::findOrFail($id);
		$comments=Comment::all();
		return View::make('show',compact('showarticle','comments'));	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	
	    $getarticle=Article::findOrFail($id);
	    $getstatus=Article::select('Status')->where('id',$id)->get();
		return View::make('edit', compact('getarticle','getstatus'));

	}
	
	public function delete($id)
	{
		$delarticle=Article::findOrFail($id);
		return View::make('delete', compact('delarticle'));
	}
    
    public function comment($id)
    {
    	$commarticle=Article::findOrFail($id);
		return View::make('comment', compact('commarticle'));
    }

     public function handleCreate( )
     {
     	//$regex=/^https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
     	
     	$rules=Article::$rules;
      	$validator = Validator::make(Input::all(),$rules);
    	 if ($validator->fails()) 
    	{
        $messages = $validator->messages();
        return Redirect::back()
        ->withErrors($validator);			
   		}
    else
    {
     	   $article = new Article;
           $article->Name = Input::get('Name');
           $article->Description= Input::get('Description');
           $article->URL = Input::get('url');
           if(Input::hasFile('Img_Path'))
  			{
 				$file = Input::file('Img_Path');
				$filename = time(). '-' . $file->getClientOriginalName();
				// $file = $file->move(public_path().'/images/', $filename);
			}
           		$article->Img_Path='/images/'.$filename;
           		$article->Status = Input::get('Status');
          	   $article->save();
          	   if(!$article->save())
          	   {
    			App::abort(500, 'Error');
			   }
			  else
			    {	
			    	$user=Article::orderBy('id','desc')->first();
			    	if($user)
			    	{
			    		$article->Img_Path='/images/'.$user->id.'/'.$filename;
			    		$article->save();
			    	}
					$file = $file->move(public_path().'/images/'.$user->id, $filename);
				}		
          	return Redirect::action('ArticlesController@Index');
      }
     }

 public function handleEdit($id)
  {
  		
     
  	$rules=Article::$rules;
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) 
    {	

		$messages = $validator->errors()->getMessages();
	
   		//return Redirect::action('ArticlesController@edit')
          //  ->withErrors($validator);
		return Redirect::back()->withErrors($validator);
    }
 	
 	else
	{  

       	   $article = Article::findOrFail($id);
       	   $article->Name = Input::get('Name');
           $article->Description= Input::get('Description');
           $article->URL = Input::get('url');
           if(Input::hasFile('Img'))
  			{
 				$file = Input::file('Img');
				$filename = time(). '-' . $file->getClientOriginalName();
				//$image_path = public_path().'/'.$article->Img_Path;
				//unlink($image_path);
				$image_path = public_path().$article->Img_Path;
				unlink($image_path);
				
			}
          	$article->Img_Path='/images/'.$article->id.'/'.$filename;
           $article->Status = Input::get('Status');
           $article->save();
           if(!$article->save())
           {
           	App::abort(500, 'Error');
           }
           else
           {
           	$file = $file->move(public_path().'/images/'.$article->id, $filename);
           }
          

    		return Redirect::action('ArticlesController@Index');
	}	
    
}
 public function handleDelete($id)
   {
           // Handle the delete confirmation.
    $article = Article::findOrFail($id);
     $image_path = public_path().$article->Img_Path;
     $image_dir=public_path().'/images/'.$article->id;
      unlink($image_path);
      rmdir($image_dir);
    $article->delete();
 	return Redirect::action('ArticlesController@Index');
    }
 
 public function handleComment($id)
 {
 	$article=Article::findOrFail($id);
 	$comment=new Comment;
 	$comment->article_id=$article->id;
 	$comment->comments=Input::get('comment_content');
 	$comment->save();
 	return Redirect::action('ArticlesController@Index');
 }


}
