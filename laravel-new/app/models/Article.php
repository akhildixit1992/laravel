 <?php
  use Illuminate\Database\Eloquent\Model;
 class Article extends Eloquent
{
		  public function posts()
		  {
		  	return $this->hasMany('App\Comment');
		  }
	      	

 public static function add($input){
    $validator = Article::checkInput($input); // method defined at the bottom to check validity of the data
    if ($validator->fails()) {
      return $validator;
    }
	   $article = new Article();
     $article->Name=$input['firstName'];
     $article->description=$input['description'];
    $article->URL =$input['url'];
    $article->Status=$input['status'];
    if(Input::hasFile('imagePath'))
  				{
 				$file = Input::file('imagePath');
				$filename = time(). '-' . $file->getClientOriginalName(); 
				}
           		$article->Img_Path='/images/'.$filename;

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
        return $article->id;
    // return id of the newly saved article
  }

  public static function updateArticle($id, $input){
    $validator = Article::checkInput($input); // method defined at the bottom to check validity of the data
    if ($validator->fails()) {
      return $validator;
    }

     $article = Article::findOrFail($id);
    // save attribute values for $article
     $article->Name=$input['firstName'];
     $article->description=$input['description'];
     $article->URL =$input['url'];
     $article->Status=$input['status'];
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
           $article->save();
           if(!$article->save())
           {
            App::abort(500, 'Error');
           }
           else
           {
            $file = $file->move(public_path().'/images/'.$article->id, $filename);
           }
           return $article->id;

    // return id of updated article
  }

  public static function deleteArticle($id)
  {
    $article = Article::findOrFail($id);
     $image_path = public_path().$article->Img_Path;
     $image_dir=public_path().'/images/'.$article->id;
      unlink($image_path);
      rmdir($image_dir);
      $article->delete();
      return $article->id;
  }

  public static function commentArticle($id,$input)
  {
    $validator = Comment::checkInput($input); // method defined at the bottom to check validity of the data
    if ($validator->fails()) {
      return $validator;
    }
    $article=Article::findOrFail($id);
    $comment=new Comment;
    $comment->article_id=$article->id;
    $comment->comments=$input['comment_content'];
    $comment->save();
    return $article->id;
  }

  public static function checkInput($input){
    $rules = array(
      			'firstName'             =>'required',
        		'description'      		=>'required',
        		'url'    		   		=>'required|url'
    );
    $validator = Validator::make($input, $rules);
    return $validator;
  }
}