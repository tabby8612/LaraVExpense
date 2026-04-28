<?php

namespace App\Services\Category;

use App\Dtos\Category\CategoryDTO;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(CategoryDTO $categoryDTO) {
        $category = Category::query()->create($categoryDTO->toArray());

        return $category;
    }

    public function getAll() {
        $categories = Category::query()
                      ->with(['user'])
                      ->where('createdBy', Auth::id())
                      ->get();

        return $categories;
    }

    public function getById(string $id): Category {
        try {
            $category = Category::query()
                        ->with(['user'])
                        ->where('createdBy', Auth::id())
                        ->findOrFail($id);

            return $category;
        } catch (ModelNotFoundException $e) {
            throw new Exception('Model Not Found', 404);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Category $category, CategoryDTO $categoryDTO) {
        $data = array_filter($categoryDTO->toArray(), fn ($value) => $value !== null);

        $category->update($data);

        return $category;
    }

    public function delete(Category $category) {
        $category = $this->getById($category->id);

        return $category->delete();
    }
}
