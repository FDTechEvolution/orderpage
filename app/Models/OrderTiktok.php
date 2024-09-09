<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderTiktok
 * 
 * @property string $id
 * @property Carbon|null $created
 * @property Carbon|null $modified
 * @property string $orderid
 * @property string|null $status
 * @property string|null $trackingno
 * @property Carbon|null $order_datetime
 * @property string|null $buyer_username
 * @property string|null $recipient
 * @property string|null $phone
 * @property string|null $province
 * @property string|null $payment_method
 * @property string $org_id
 * @property string|null $warehousename
 * @property float|null $total_settlement_amount
 * @property float|null $total_revenue
 * @property float|null $seller_discounts
 * @property float|null $total_fees
 * @property float|null $transaction_fee
 * @property float|null $commission_fee
 * @property float|null $seller_shipping_fee
 * @property float|null $actual_shipping_fee
 * @property float|null $platform_shipping_fee_discount
 * @property float|null $customer_shipping_fee
 * @property float|null $refund_customer_shipping_fee
 * @property float|null $shipping_fee_subsidy
 * @property float|null $affiliate_commission
 * @property float|null $affiliate_partner_commission
 * @property float|null $sfp_service_fee
 * @property float|null $ajustment_amount
 * @property float|null $customer_payment
 * @property float|null $estimated_package_weight
 * @property float|null $actual_package_weight
 * @property Carbon|null $order_settled_time
 * @property string|null $cancel_reason
 * @property float|null $totalamt
 *
 * @package App\Models
 */
class OrderTiktok extends Model
{
	protected $table = 'order_tiktoks';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'created' => 'datetime',
		'modified' => 'datetime',
		'order_datetime' => 'datetime',
		'total_settlement_amount' => 'float',
		'total_revenue' => 'float',
		'seller_discounts' => 'float',
		'total_fees' => 'float',
		'transaction_fee' => 'float',
		'commission_fee' => 'float',
		'seller_shipping_fee' => 'float',
		'actual_shipping_fee' => 'float',
		'platform_shipping_fee_discount' => 'float',
		'customer_shipping_fee' => 'float',
		'refund_customer_shipping_fee' => 'float',
		'shipping_fee_subsidy' => 'float',
		'affiliate_commission' => 'float',
		'affiliate_partner_commission' => 'float',
		'sfp_service_fee' => 'float',
		'ajustment_amount' => 'float',
		'customer_payment' => 'float',
		'estimated_package_weight' => 'float',
		'actual_package_weight' => 'float',
		'order_settled_time' => 'datetime',
		'totalamt' => 'float'
	];

	protected $fillable = [
		'created',
		'modified',
		'orderid',
		'status',
		'trackingno',
		'order_datetime',
		'buyer_username',
		'recipient',
		'phone',
		'province',
		'payment_method',
		'org_id',
		'warehousename',
		'total_settlement_amount',
		'total_revenue',
		'seller_discounts',
		'total_fees',
		'transaction_fee',
		'commission_fee',
		'seller_shipping_fee',
		'actual_shipping_fee',
		'platform_shipping_fee_discount',
		'customer_shipping_fee',
		'refund_customer_shipping_fee',
		'shipping_fee_subsidy',
		'affiliate_commission',
		'affiliate_partner_commission',
		'sfp_service_fee',
		'ajustment_amount',
		'customer_payment',
		'estimated_package_weight',
		'actual_package_weight',
		'order_settled_time',
		'cancel_reason',
		'totalamt'
	];
}
