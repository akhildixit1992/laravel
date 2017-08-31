 <?php
  use Illuminate\Database\Eloquent\Model;
 class Article extends Eloquent
{
		  public function posts()
		  {
		  	return $this->hasMany('App\Comment');
		  }

		   
		 public static $rules=array(
     		'Name'             =>'required',
        		'Description'      =>'required',
        		'url'    		   =>'required|url'
   		 );	      	


}