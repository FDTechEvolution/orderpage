<?php

namespace App\View\Components\Selection;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Shipping extends Component
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
        $shippings = \App\Models\Shipping::where('isactive','Y')->where('org_id',getOrgId())->orderBy('name','ASC')->get();

        return view('components.selection.shipping',['shippings'=>$shippings]);
    }
}
