<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Requests\SubCategory\SubCategoryCreateRequest;
use App\Http\Requests\SubCategory\SubCategoryUpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Models\Category;
use App\Models\SubCategory;
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

    public function show(SubCategory $subCategory) {
        $categoryDetail = $this->subCategoryService->getById($subCategory->id);

        return new SubCategoryResource($categoryDetail);
    }

    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory) {
        
        Gate::authorize('update', $subCategory);
    
        $subCategoryDTO = $request->toDTO();

        $subCategory = $this->subCategoryService->getById($subCategory->id);

        $updatedCategory = $this->subCategoryService->update($subCategory, $subCategoryDTO);

        return response()->json([
            'message'=> 'Category Updated Successfully',
            'data'=> new SubCategoryResource($updatedCategory),
            'success'=> true,
        ]);
    }

    public function destroy(SubCategory $subCategory) {
        Gate::authorize('delete', $subCategory);

        $isDeleted = $this->subCategoryService->delete($subCategory);

        return response()->json([
            'message'=> 'Deleted Successfully',
            'success' => true
        ]);
    }
}
