<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::when($request->search,function($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->paginate(10);
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories,name',
        ]);

        Category::create($request->all());

        session()->flash('success','Category Added Successfully');
        return redirect()->route('dashboard.categories.index');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|unique:categories,name',
        ]);

        $category->update($request->all());
        session()->flash('success','Category Edited Successfully');
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success','Category Deleted Successfully');
        return back();
    }
}
