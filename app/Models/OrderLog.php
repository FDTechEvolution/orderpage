<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class OrderLog
 *
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property string $user_id
 * @property string $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OrderLog extends Model
{
    use HasUuids;
	protected $table = 'order_logs';
	public $incrementing = false;

	protected $fillable = [
		'title',
		'description',
		'user_id',
		'order_id'
	];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
}
