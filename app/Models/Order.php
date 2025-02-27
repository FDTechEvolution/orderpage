<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Order
 *
 * @property string $id
 * @property string $customer_id
 * @property Carbon $orderdate
 * @property string $payment_method
 * @property string|null $bank_account_id
 * @property string|null $status
 * @property Carbon|null $void_date
 * @property string|null $description
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property float|null $totalamt
 * @property string|null $user_id
 * @property string|null $note
 * @property string|null $order_line_des
 * @property string|null $order_line_code
 * @property Carbon|null $record_date
 * @property string|null $createdby
 * @property string|null $modifiedby
 * @property string|null $ordercode
 * @property Carbon|null $shipping_date
 * @property string|null $shipping_id
 * @property string|null $shipping_stamp
 * @property Carbon|null $print_date
 * @property string|null $trackingno
 * @property string|null $facebook_page_id
 * @property string|null $status2
 * @property string|null $state_text
 * @property string|null $order_text
 * @property string|null $tmp_order_id
 * @property string|null $payment_status
 * @property string|null $ispaid_recorder
 * @property string|null $issqueeze
 * @property string|null $iscutoff
 * @property string|null $isspecialcase
 * @property string|null $type
 * @property string $org_id
 * @property Carbon|null $duedate
 * @property string|null $printing_set_id
 * @property Carbon|null $automation_modified
 * @property string|null $historylog
 * @property string|null $sales_channel_id
 * @property string|null $sales_channel_line_id
 * @property string|null $isrepeat_purchase
 * @property string|null $is_cod_received
 * @property float|null $cod_receivedamt
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $shipping_status
 * @property string|null $shipping_description
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasUuids;
    protected $table = 'orders';
    public $incrementing = false;

    protected $casts = [
        'orderdate' => 'datetime',
        'void_date' => 'datetime',
        'created' => 'datetime',
        'modified' => 'datetime',
        'totalamt' => 'float',
        'record_date' => 'datetime',
        'shipping_date' => 'datetime',
        'print_date' => 'datetime',
        'duedate' => 'datetime',
        'automation_modified' => 'datetime',
        'cod_receivedamt' => 'float'
    ];

    protected $fillable = [
        'customer_id',
        'orderdate',
        'payment_method',
        'bank_account_id',
        'status',
        'void_date',
        'description',
        'created',
        'modified',
        'totalamt',
        'user_id',
        'note',
        'order_line_des',
        'order_line_code',
        'record_date',
        'createdby',
        'modifiedby',
        'ordercode',
        'shipping_date',
        'shipping_id',
        'shipping_stamp',
        'print_date',
        'trackingno',
        'facebook_page_id',
        'status2',
        'state_text',
        'order_text',
        'tmp_order_id',
        'payment_status',
        'ispaid_recorder',
        'issqueeze',
        'iscutoff',
        'isspecialcase',
        'type',
        'org_id',
        'duedate',
        'printing_set_id',
        'automation_modified',
        'historylog',
        'sales_channel_id',
        'sales_channel_line_id',
        'isrepeat_purchase',
        'is_cod_received',
        'cod_receivedamt',
        'shipping_status',
        'shipping_description'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function org()
    {
        return $this->hasOne(Org::class, 'id', 'org_id');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'id', 'shipping_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class, 'order_id', 'id')->with('product')->orderBy('created', 'ASC');
    }

    public function orderLogs()
    {
        return $this->hasMany(OrderLog::class, 'order_id', 'id')->with('user')->orderBy('created_at', 'ASC');
    }
}
