<?php

namespace App\View\Components\Order;

use App\Helpers\AppStatusHelper;
use App\Http\Controllers\OrderController;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $statuses = AppStatusHelper::getOrderStatus();

        return view('components.order.status', ['statuses' => $statuses]);
    }
}
