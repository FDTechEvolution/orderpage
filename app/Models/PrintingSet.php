<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PrintingSet
 *
 * @property string $id
 * @property string $user_id
 * @property string $shipping_id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $status
 * @property string|null $description
 * @property string $org_id
 *
 * @package App\Models
 */
class PrintingSet extends Model
{
    use HasUuids;
    protected $table = 'printing_sets';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'created' => 'datetime',
        'modified' => 'datetime'
    ];

    protected $fillable = [
        'user_id',
        'shipping_id',
        'created',
        'modified',
        'status',
        'description',
        'org_id'
    ];


    public function orders()
    {
        return $this->hasMany(Order::class, 'printing_set_id', 'id')->orderBy('created', 'ASC');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'id', 'shipping_id');
    }
}
