<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;


class CategoryDropdown extends Component
{

    public function render()
    {
        return view('components.category-dropdown',[
            'categories'=>Category::all(),
            'currentcategory'=>Category::firstWhere('slug',request('category'))
        ]);
    }
}
