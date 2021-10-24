<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetch all categories and sub categories
        $categories = Category::with('subCategories')->whereNull('parent_id')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Fetch all categories and sub categories for creating categories
        $categories = Category::with('subCategories')->whereNull('parent_id')->get();
        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreCategoryRequest $request)
    {
        //
        // dd($request)
        // return $request;


        // Validating Request
        // $this->validate($request, [
        //     'name' => ['required', 'max:200'],
        //     'parent_id' => ['sometimes', 'nullable', 'numeric'],
        // ]);
        //Validating is being done from the StoreCategoryRequest imported form the top

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category Successfully Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        //Fetch all categories and sub categories
        // $id = 
        // $categories = Category::with('subCategories')->whereNull('parent_id')->get();
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //No need to instnatiate, model has been binded
        // $category = new Category();
        $category->name = $request->name;
        // $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->name);
        $category->update();

        return redirect()->route('categories.index')->with('message', 'Category Updated Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category Deleted Created');
    }
}
