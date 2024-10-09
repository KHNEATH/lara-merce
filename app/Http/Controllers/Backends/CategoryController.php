<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('backends.categories.index')->with('categories', $categories);
    }

    public function create(){
        return view('backends.categories.create');
    }

    public function store(Request $request){
        
        $categoryData = $request->all();

        $file = $request->file('icon');
        if(!$file) {
            return back();
        }
        $filename = time() . '_' . $file-> getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filenameAndPath = 'products/' . $filename . '.' . $extension;

        $file->storeAs('public/' . $filenameAndPath);
        $categoryData['icon'] = 'storage/'. $filenameAndPath;

        Category::create($categoryData);
        return redirect(route('backends.categories.index'));
    }
    
    public function edit(Category $category){
        return view('backends.categories.edit', [
            'category' => $category
        ]);
    }

    // public function update(Category $category, Request $request){
    //     $category->title = $request->get('title');
    //     $category->save();
    //     return redirect(route('backends.categories.index'));
    // }

    public function destroy(Category $category){
        $category->delete();
        return redirect(route('backends.categories.index'));
    }

    public function update(Category $category, Request $request){
        
        $categoryData = $request->all();

        $file = $request->file('icon');
        if($file) {
            $filename = time() . '_' . $file-> getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameAndPath = 'products/' . $filename . '.' . $extension;

            $file->storeAs('public/' . $filenameAndPath);
            $categoryData['icon'] = 'storage/'. $filenameAndPath;
            // Delete old icon
            File::delete($category->icon);

        }
        
        $category->update($categoryData);
        return redirect(route('backends.categories.index'));

    }
}
