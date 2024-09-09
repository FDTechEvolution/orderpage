<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FacebookPage
 * 
 * @property string $id
 * @property string $name
 * @property string|null $url
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class FacebookPage extends Model
{
	protected $table = 'facebook_pages';
	public $incrementing = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime'
	];

	protected $fillable = [
		'name',
		'url',
		'created',
		'modified',
		'description'
	];
}
