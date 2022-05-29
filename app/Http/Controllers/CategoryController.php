<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = Category::select('categories.*', 'parent.name as parent')->leftjoin('categories as parent', 'parent.id', '=', 'categories.parent_id')->paginate(10);
        $categories = Category::with('parent')->paginate(10);
        return response()->json($categories, 200);
    }

    public function getAll($id)
    {
        return response()->json(Category::all()->except($id), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bulkcreate(Request $request)
    {
        $request->validate(([
            'name' => 'required'
        ]));

        $names = explode(",", $request->name);

        if (is_array($names)) {
            $n = 0;
            foreach ($names as $name) {
                $name = trim($name);
                if (!empty($name)) {
                    Category::insert([
                        'name' => $name,
                        'slug' => Str::slug($name)
                    ]);
                    $n++;
                }
            }
        }

        return response()->json($n . " categories inserted.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Fillable fields
         *
         * name (string compulsory)
         * slug (string compulsory)
         * description (string nullable)
         * image (string nullable)
         * status (binary default 1)
         * parent_id (nullable)
         */
        $success = false;
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        $file_name = null;
        if ($request->image) {
            $file      = explode(';', $request->image);
            $file      = explode('/', $file[0]);
            $file_ex   = end($file);
            $file_name = uniqid() . '.' . $file_ex;
        }
        $success = Category::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'description'   => $request->description,
            'status'        => $request->status,
            'parent_id'     => $request->parent_id,
            'image'         => $file_name,
        ]);
        if ($success && $file_name) {
            Image::make($request->image)->save(public_path('storage/category/') . $file_name);
            Image::make($request->image)->resize(240, 240)->save(public_path('storage/category/thumbs/') . $file_name);
        }
        return response()->json([
            'success' => $success,
        ], 200);
        // $category = Category::create([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'status'=>$request->status,
        //     'parent_id' => $request->parent_id,
        // ]);
        // $category = new Category;
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->image = $request->image;
        // $category->slug = Str::slug($request->name, '_');
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $image_name = uniqid(). '.'. $ext;
        //     $file->move('storage/post' ,$image_name);
        //     $category->image = $image_name;
        //  }

        //  $category->save();
        // return response($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category, 200);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => "required|unique:categories,name,$category->id",
        ]);
        //Storage::delete(['category/' . $category->image, 'category/thumbs/' . $category->image]);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        if ($request->image) {
            $file      = explode(';', $request->image);
            $file      = explode('/', $file[0]);
            $file_ex   = end($file);
            $file_name = uniqid() . '.' . $file_ex;
            Image::make($request->image)->save(public_path('storage/category/') . $file_name);
            Image::make($request->image)->resize(240, 240)->save(public_path('storage/category/thumbs/') . $file_name);

            if ($category->image) {
                Storage::delete(['public/category/' . $category->image, 'public/category/thumbs/' . $category->image]);
            }
            $category->image = $file_name;
        }

        $category->update();

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $image = $category->image;
        $deleted = $category->delete();
        if ($image && $deleted) {
            Storage::delete(['public/category/' . $image, 'public/category/thumbs/' . $image]);
        }
        return $deleted ? response('Successfully Deleted.') : response('Something went wrong', http_response_code());
    }

    public function bulkdelete(Request $request)
    {
        foreach ($request->ids as $id) {
            $category = Category::find($id);
            $image = $category->image;
            $deleted = $category->delete();
            if ($image && $deleted) {
                Storage::delete(['public/category/' . $image, 'public/category/thumbs/' . $image]);
            }
        }
        return response()->json(count($request->ids));
    }

    public function changestatus(Request $request)
    {
        return Category::whereIn('id', $request->ids)->update(['status' =>  $request->status]) ?
            response()->json(count($request->ids)) :
            response()->json(0);
    }
}