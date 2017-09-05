 <?php
 use Illuminate\Database\Eloquent\Model;
 class Comment extends Eloquent
{

		public function article()
		{
			return $this->belongsTo('App\Article');
		}

		 public static function checkInput($input){
    			$rules = array(
      			'comment_content'             =>'required'
      			);
    $validator = Validator::make($input, $rules);
    return $validator;
  }

}