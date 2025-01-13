<?php

namespace App\View\Components\Crm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Illuminate\Support\Facades\Route;

class Menu extends Component
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
        $currentRouteName = Route::currentRouteName();
        //dd($currentRouteName);
        return view('components.crm.menu', ['currentRouteName' => $currentRouteName]);
    }
}
