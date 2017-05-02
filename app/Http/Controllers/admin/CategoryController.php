<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $cateReposi;
    public function __construct(CategoryRepositoryEloquent $cateReposi){
        $this->cateReposi = $cateReposi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = $this->cateReposi->with(['parent'])->all();
        return view('admin.category.manager', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = $this->cateReposi->all();
        return view('admin.category.add', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->cateReposi->create([
                'cate_name' => $request->cate_name,
                'slug' => str_slug($request->cate_name),
                'parent_id' => $request->parent_id,
                'description' => $request->description,
            ]);
        return redirect()->route('category.index')->with(['flash_message' => 'Tạo danh mục thành công!', 'flash_level' => 'success']);
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
        $cates = $this->cateReposi->all();
        $cate = $this->cateReposi->find($id);
        return view('admin.category.edit', compact('cate', 'cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->cateReposi->update([
                'cate_name' => $request->cate_name,
                'slug' => str_slug($request->slug),
                'description' => $request->description,
                'parent_id' => $request->parent_id,
            ], $id);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cateReposi->delete($id);
        return redirect()->route('category.index')->with(['flash_message' => 'Xóa danh mục thành công!', 'flash_level' => 'success']);
    }

/**
Make slug from input and check unique slug in category table
*/
    public function makeSlug()
    {
        if (isset($_GET['str'])) {
            $str = $_GET['str'];
            $slug = str_slug($str);
            //Check slug in category table
            $countSlug = count($this->cateReposi->findWhere(['slug' => $slug]));
            //if has slug in category table => return false else => return true and slug
            if ($countSlug > 0) {
                $result = false;
            } else {
                $result = true;
            }
        } else {
            $result = false;
            $slug = "";
        }
        echo json_encode([$result, 'slug' => $slug]);
    }

}
