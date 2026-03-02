<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CategoryRepository;
use App\Utils\ImageManagerUtils;

class CategoryService
{
    protected $categoryRepository, $imageManagerUtils;

    public function __construct(CategoryRepository $categoryRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->categoryRepository = $categoryRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    public function getCategory($id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if (!$category) {
            return false;
        }
        return $category;
    }

    public function getCategories($filters = [])
    {
        return $this->categoryRepository->getCategories($filters);
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function store($data)
    {
        if (array_key_exists('icon', $data) && $data['icon'] != null) {
            $data['icon'] = $this->imageManagerUtils->saveResizeImage($data['icon'], 'categories', 500, 500);
        } else {
            $data['icon'] = '';
        }

        return $this->categoryRepository->storeCategory($data);
    }

    public function update($data)
    {
        $category = $this->getCategory($data['id']);
        if (!$category) {
            return false;
        }

        if (array_key_exists('icon', $data) && $data['icon'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($category->icon, 'categories');
            $data['icon'] = $this->imageManagerUtils->saveResizeImage($data['icon'], 'categories', 500, 500);
        } else {
            if ($category->icon != null) {
                $data['icon'] = $category->icon;
            } else {
                $data['icon'] = '';
            }
        }

        $this->categoryRepository->updateCategory($category, $data);
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->getCategory($id);
        if (!$category) {
            return false;
        }

        if (!empty($category->icon)) {
            $this->imageManagerUtils->removeImageFromLocal($category->icon, 'categories');
        }

        return $this->categoryRepository->destroyCategory($category);
    }

    public function changeStatus($id, $status)
    {
        $category = $this->getCategory($id);
        if (!$category) {
            return false;
        }

        $this->categoryRepository->changeStatusCategory($category, $status);
        $category->status = $status;
        return $category;
    }
}
