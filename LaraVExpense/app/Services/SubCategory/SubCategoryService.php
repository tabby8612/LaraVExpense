<?php

namespace App\Services\SubCategory;

use App\Dtos\SubCategory\SubCategoryDTO;
use App\Models\SubCategory;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function getById(string $id): SubCategory {
        try {
            $subCategory = SubCategory::query()
                        ->with(['user:id,name,email', 'category:id,name,description,transactionType'])
                        ->where('createdBy', Auth::id())
                        ->findOrFail($id);

            return $subCategory;
        } catch (ModelNotFoundException $e) {
            throw new Exception('Model Not Found', 404);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(SubCategory $subCategory, SubCategoryDTO $subCategoryDTO) {
        $data = array_filter($subCategoryDTO->toArray(), fn ($value) => $value !== null);

        $subCategory->update($data);

        return $subCategory;
    }

    public function delete(SubCategory $subCategory) {
        $subCategory = $this->getById($subCategory->id);

        return $subCategory->delete($subCategory->id);
    }
}
