<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    const ROLE_MEMBER = 'member';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isMember = $this->isMember();
        $categories = $this->getCategories();
        $subCategoriesNumber = 0;
        foreach ($categories as $category){
            $categoryId = $category->id;

            $currentCategory = $this->getCategory($categoryId);
            if ($currentCategory->id == $categoryId){
                $subCategoriesNumber += 1;
            }
        }
        $data = [
            'categories' => $categories,
            'isMember' => $isMember
        ];

        return view('categories/categories')->with($data);
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
        $isMember = $this->isMember();
        $topics = topics::all()->where('category_id', '==', $id);
        $category = categories::find($id);
        $data = [
            'category' => $category,
            'topics' => $topics->reverse(),
            'isMember' => $isMember
        ];

        return view('categories/category')->with($data);
    }

    public function getAddCategory()
    {
        $categories = $this->getSelectedCategories();

        return view('categories/add_category')->with('categories', $categories);
    }

    public function getSelectedCategories()
    {
        $categories = $this->getCategories();

        $data = [];
        foreach ($categories as $key => $category){
            $categoryId = $category->id;
            $categorytitle = $category->title;
            $data[$categoryId] = $categoryId .'. '. $categorytitle;
        }

        return $data;
    }

    public function getEditCategory($id)
    {
        $category = Categories::find($id);
        $categories = $this->getSelectedCategories();
        unset($categories[$id]);

        $data = [
            'category' => $category,
            'categories' => $categories
        ];

        return view('categories/edit_category')->with($data);
    }

    public function submitEditCategory(Request $request)
    {
        // Form fields values
        $title = $request->input('title');
        $description = $request->input('description');
        $categoryId = $request->input('category_id');
        $parentId = $request->input('parent_id');

        $this->validate($request, [
            'title' => 'required',
        ]);

        Categories::where('id', $categoryId)
            ->update([
                'title' => $title,
                'description' => $description,
                'parent_id' => $parentId,
            ]);

        return redirect()->route('category', ['id' => $categoryId])->with('success', 'You successfully update the category #'.$categoryId.' :)');
    }

    public function getDeleteCategory($id)
    {
        $currentCategory = Categories::find($id);
        $categories = Categories::all();

        foreach ($categories as $key => $subCategory)
        {
            $subCategoryId = $subCategory->id;
            $subParentId = $subCategory->parent_id;

            if ($subParentId == $id ){
                // check if the sub category is the parent of one another
                $subSubCategory =  Categories::where('parent_id', $subCategoryId);
                $subSubCategory->delete();

                // delete subcategory of current category
                $subCategory->deleteCategory();
            }
        }
        // delete current category
        $currentCategory->deleteCategory();

        return redirect()->route('categories');
    }

    public function isMember()
    {
        $roleMember = self::ROLE_MEMBER;
        $user = Auth::user();
        $isMember = $user->hasRole($roleMember);

        return $isMember;
    }
}
