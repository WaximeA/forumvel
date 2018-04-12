<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getCategories();
        $subCategoriesNumber = 0;
        foreach ($categories as $category){
            $categoryId = $category->id;

            $currentCategory = $this->getCategory($categoryId);
            if ($currentCategory->id == $categoryId){
                $subCategoriesNumber += 1;
            }
        }

        return view('categories/categories')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submitAddCategory(Request $request)
    {
        // Form fields values
        $title = $request->input('title');
        $description = $request->input('description');
        $parentCategory = $request->input('parent_id');

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $category = new Categories;
        $category->title = $title;
        $category->description = $description;
        $category->parent_id = $parentCategory;
        $category->creator_id = auth()->user()->id;
        $category->save();

        return redirect('categories')->with('success', 'You successfully create a new category');
    }

    public function getCategories()
    {
       return categories::all();
    }

    public function getCategory($id)
    {
        $category = categories::find($id);

        return view('categories/category')->with('category', $category);
    }

    public function getAddCategory()
    {
        $categories = $this->getCategories();

        $data = [];
        foreach ($categories as $key => $category){
            $categoryId = $category->id;
            $categorytitle = $category->title;
            $data[$categoryId] = $categorytitle;
        }

        return view('categories/add_category')->with('data', $data);
    }

    public function getSubCategoriesNumber()
    {

    }
}
