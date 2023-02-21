<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function getAllCategories(){
        $categories = Category::get();
        return response() -> json(['categories' => $categories], 200);
    }

    public function showHomeWhithCategories(){
        $categories = Category::with('product') -> get();
        return view('index', ['categories' => $categories]);
    }

    public function getAllCategoriesForDataTable(){
        $categories = Category::get();
		return DataTables::of($categories)
			->addColumn('action', function ($row) {
				return "<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='edit'
				class='btn btn-warning btn-sm'>Edit</a>
				<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='delete'
				class='btn btn-danger btn-sm'>Delete</a>";
			})
			->rawColumns(['action'])
			->make();
    }

    public function getACategory(Category $category){
        $category -> get();
        return response() -> json(['category' => $category], 200);
    }

    public function saveCategory(Request $request){
		$category = new Category($request->all());
		$category->save();
		return response()->json(['category' => $category], 201);
	}

    public function updateCategory(Category $category, Request $request){
		$category->update($request->all());
		return response()->json(['category' => $category->refresh()], 201);
	}

    public function deleteCategory(Category $category){
		$category->delete();
		return response()->json([], 204);
	}

    public function categoriesView(){
		return view('categoriesview.index');
	}

	public function showCategories(){
		return view('categories.index');
	}

	public function getAllCategoriesWithProducts(Category $category){
		$category = Category::with('Products')->get();
		return response()->json(['category' => $category], 200);
	}

	public function getACategoryWithProduct(Category $category){
		$category->load('Product');
		return view('categoriesview.index', compact('category'));
	}
}
