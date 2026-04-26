<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        
        $categories = $this->categoryService->getAll();

        return response()->json([
            'message' => 'Data fetching Successfully',
            'data'=> CategoryResource::collection($categories),
            'success' => true
        ]);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request) {
        
        $categoryDTO = $request->toDTO();

        $category = $this->categoryService->create($categoryDTO);

        return response()->json([
            'message' => 'Category Created Successfully',
            'data' => $category,
            'success' => true,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) {
        $categoryDetail = $this->categoryService->getById($category->id);

        return new CategoryResource($categoryDetail);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category) {
        
        Gate::authorize('update', $category);
    
        $categoryDTO = $request->toDTO();

        $category = $this->categoryService->getById($category->id);

        $updatedCategory = $this->categoryService->update($category, $categoryDTO);

        return response()->json([
            'message'=> 'Category Updated Successfully',
            'data'=> new CategoryResource($updatedCategory),
            'success'=> true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        Gate::authorize('delete', $category);

        $isDeleted = $this->categoryService->delete($category);

        return response()->json([
            'message'=> 'Deleted Successfully',
            'success' => true
        ]);
    }
}
