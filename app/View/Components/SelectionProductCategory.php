<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class SelectionProductCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $all = true,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $productCategoryOptions = Cache::remember('product_catogory_active_options_' . getOrgId(), 60, function () {
            return ProductCategory::where('org_id', getOrgId())
                ->where('isactive', 'Y')
                ->orderBy('name')
                ->pluck('name', 'id')
                ->toArray();
        });

        return view('components.selection-product-category', ['productCategoryOptions' => $productCategoryOptions]);
    }
}
