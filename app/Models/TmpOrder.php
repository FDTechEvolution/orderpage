<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class TmpOrder
 *
 * @property string $id
 * @property string $code
 * @property string|null $name
 * @property string $body
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string|null $status
 * @property string|null $user_id
 * @property string|null $modifiedby
 * @property string|null $type
 * @property string|null $address
 * @property string|null $mobile
 * @property float|null $price
 * @property string|null $description
 * @property string|null $source
 * @property string|null $slip_path1
 * @property string|null $slip_path2
 * @property string|null $line_userid
 * @property string|null $payment_method
 * @property string|null $org_id
 * @property string|null $issent_notification
 * @property string|null $label
 *
 * @package App\Models
 */
class TmpOrder extends Model
{
    use HasUuids;
    protected $table = 'tmp_orders';
    public $incrementing = false;
    public $timestamps = true;

    protected $casts = [
        'created' => 'datetime',
        'modified' => 'datetime',
        'created_at' => 'datetime',
        'modified_at' => 'datetime',
        'price' => 'float'
    ];

    protected $fillable = [
        'code',
        'name',
        'body',
        'created',
        'modified',
        'status',
        'user_id',
        'modifiedby',
        'type',
        'address',
        'mobile',
        'price',
        'description',
        'source',
        'slip_path1',
        'slip_path2',
        'line_userid',
        'payment_method',
        'org_id',
        'issent_notification',
        'label'
    ];

    public function org()
    {
        return $this->hasOne(Org::class, 'id', 'org_id');
    }
}
