<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Requests\SubCategory\SubCategoryCreateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Models\Category;
use App\Services\Category\CategoryService;
use App\Services\SubCategory\SubCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubCategoryController extends Controller
{
    public function __construct(private SubCategoryService $subCategoryService)
    {
    }  

    public function index() {
        
        $subCategories = $this->subCategoryService->getAll();

        return response()->json([
            'message' => 'Data fetching Successfully',
            'data'=> SubCategoryResource::collection($subCategories),
            'success' => true
        ]);
    }   

    public function store(SubCategoryCreateRequest $request) {
        
        $subCategoryDTO = $request->toDTO();

        $subCategory = $this->subCategoryService->create($subCategoryDTO);

        return response()->json([
            'message' => 'SubCategory Created Successfully',
            'data' => $subCategory,
            'success' => true,
        ], 201);
    }

    // public function show(Category $category) {
    //     $categoryDetail = $this->categoryService->getById($category->id);

    //     return new CategoryResource($categoryDetail);
    // }

    // public function update(CategoryUpdateRequest $request, Category $category) {
        
    //     Gate::authorize('update', $category);
    
    //     $categoryDTO = $request->toDTO();

    //     $category = $this->categoryService->getById($category->id);

    //     $updatedCategory = $this->categoryService->update($category, $categoryDTO);

    //     return response()->json([
    //         'message'=> 'Category Updated Successfully',
    //         'data'=> new CategoryResource($updatedCategory),
    //         'success'=> true,
    //     ]);
    // }

    // public function destroy(Category $category) {
    //     Gate::authorize('delete', $category);

    //     $isDeleted = $this->categoryService->delete($category);

    //     return response()->json([
    //         'message'=> 'Deleted Successfully',
    //         'success' => true
    //     ]);
    // }
}
