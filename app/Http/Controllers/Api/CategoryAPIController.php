<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryAPIController extends Controller
{
    public function index() {
        $categories = Category::get();
        return response()->json($categories);
    }

    public function store(Request $request) {
        $category = Category::create($request->all());
        return response()->json($category);
    }

    public function update(Category $category, Request $request) {
        $category->title = $request->get('title');
        $category->icon = $request->get('icon');
        $category->save();
        return response()->json($category);
    }

    public function destroy(Category $category, Request $request) {
        $category->delete();
        return response()->json([
            'message' => 'Category was deleted!'
        ]);
    }
}
