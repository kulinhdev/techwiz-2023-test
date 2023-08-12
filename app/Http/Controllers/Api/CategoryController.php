<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());

        return $this->successResponse(
            data: [
                'categories' => $categories,
            ],
            message: 'Get categories successfully!',
            code: 200
        );
    }
}
