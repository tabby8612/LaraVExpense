<?php

namespace App\Services\SubCategory;

use App\Dtos\SubCategory\SubCategoryDTO;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class SubCategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(SubCategoryDTO $data) {
        return SubCategory::create($data->toArray());
    }

    public function getAll() {
        $subCategories = SubCategory::query()
                        ->select(['id', 'createdBy', 'categoryID', 'name', 'description'])
                        ->with(['category:id,transactionType,name,description', 'user:id,name,email'])
                        ->where('createdBy', Auth::id())
                        ->get();

        return $subCategories;
    }
}
