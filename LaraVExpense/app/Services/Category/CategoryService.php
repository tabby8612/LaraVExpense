<?php

namespace App\Services\Category;

use App\Dtos\Category\CategoryCreateDTO;
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

    public function create(CategoryCreateDTO $categoryDTO) {
        $category = Category::query()->create($categoryDTO->toArray());

        return $category;
    }

    public function getAll() {
        $categories = Category::query()
                      ->with(['user'])
                      ->where("createdBy", Auth::id())
                      ->get();

        return $categories;
    }

    public function getById(string $id) {
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

    public function update(Category $category, CategoryCreateDTO $categoryDTO) {
        $data = array_filter($categoryDTO->toArray(), fn ($value) => $value !== null);

        $category->update($data);

        return $category;
    }

    public function delete(Category $category) {
        $category = $this->getById($category->id);

        return $category->delete();
    }
}
