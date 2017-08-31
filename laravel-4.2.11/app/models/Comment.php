 <?php
 use Illuminate\Database\Eloquent\Model;
 class Comment extends Eloquent
{

		public function article()
		{
			return $this->belongsTo('App\Article');
		}
}