<?php

namespace App\View\Components;

use App\Helpers\AppStatusHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectionOrderStatus extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $all = true,)
    {

        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $orderStatus = AppStatusHelper::getOrderStatus();

        return view('components.selection-order-status', [
            'orderStatus' => $orderStatus
        ]);
    }
}
