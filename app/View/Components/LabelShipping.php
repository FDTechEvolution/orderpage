<?php

namespace App\View\Components;

use App\Models\Shipping;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class LabelShipping extends Component
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

        $shippingOptions = Cache::remember('shipping_options_' . getOrgId(), 60, function () {
            return Shipping::where('org_id', getOrgId())
                ->where('isactive', 'Y')
                ->orderBy('name')
                ->pluck('name', 'id')
                ->toArray();
        });


        return view('components.label-shipping', [
            'shippingOptions' => $shippingOptions
        ]);
    }
}
