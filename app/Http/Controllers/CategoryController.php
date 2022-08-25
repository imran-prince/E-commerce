<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
 
use App\Models\Category;
class CategoryController extends Controller
{
   public function create()
   {
     return view('Category.create');
   }
   public function store(Request $req)
   {
    $req->validate([
        'category_name' => 'required|unique:categories',
        
    ]);
    $category=new Category;
    $category->category_name=$req->category_name;
    $category->category_slug=Str::of($req->category_name)->slug('-');
    $category->save();
    return redirect()->back()->with('Successfully inserted');
   }

   public function index()
   {
      $category= Category::all();
      return view('Category.index',compact('category'));
   }
   public function destory($id)
   {
     Category::destroy($id);
     return redirect()->route('category.index');
        
   }

   public function edit($id)
   {
      $category=Category::find($id);
      return view('Category.edit',compact('category'));
   }

   public function update(Request $req,$id)
   {
    $category=Category::find($id);
    $category->update([
 
        'category_name'=>$req->category_name,
        'category_slug'=>Str::of($req->category_name)->slug('-'),
    ]);
      return redirect()->route('category.index');


   }
}
