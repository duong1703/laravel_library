<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\categories;
use DB;
use App\Models\admin\subcategories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories_admin()
    {
        $categories = categories::with('subcategories')->get();
        return view('/admin/pages/categories/list', compact('categories'));
    }

    public function addCategories()
    {
        return view('/admin/pages/categories/add');
    }

    public function categoriespost(Request $request)
    {
        $request->validate([
            'categories_name' => 'required|string|max:255',
            'subcategories_name' => 'required|string|max:255'
        ]);

        $categoryName = $request->input('categories_name');
        $categories = categories::where('name', $categoryName)->first();

        if (!$categories) {
            $categories = new categories();
            $categories->name = $categoryName;
            $categories->save();
        }

        $subcategories = new subcategories();
        $subcategories->name = $request->input('subcategories_name');
        $subcategories->category_id = $categories->id;
        $subcategories->save();

        $request->session()->flash('success', 'Thêm danh mục cha và danh mục con thành công!');
        return redirect()->route('categoriesadd');
    }

    public function editCategories($id)
    {
        $editCategories = categories::findOrFail($id);
        return view('/admin/pages/categories/edit', compact('editCategories'));
    }

    public function categorieseditpost(Request $request, $id)
    {
        $request->validate([
            'categories_name' => 'required|string|max:255',
            'subcategories_name' => 'required|string|max:255'
        ]);

        $categoryName = $request->input('categories_name');
        $categories = categories::where('name', $categoryName)->first();

        if (!$categories) {
            $categories = new categories();
            $categories->name = $categoryName;
            $categories->save();
        }

        $subcategories = new subcategories();
        $subcategories->name = $request->input('subcategories_name');
        $subcategories->category_id = $categories->id;
        $subcategories->save();

        $request->session()->flash('success', 'Chỉnh sửa danh mục cha và danh mục con thành công!');
        return redirect()->route('categorieslist');
    }

    public function categoriesdelete(Request $request, $id)
    {
        $subcategory = subcategories::find($id);
        if ($subcategory) {
            $subcategory->delete();
            return redirect()->route('categorieslist')->with('success', 'Xóa danh mục con thành công');
        } else {
            return redirect()->route('categorieslist')->with('error', 'Danh mục con không tồn tại');
        }

    }
}
