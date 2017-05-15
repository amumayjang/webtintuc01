<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ArticleRepositoryEloquent;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $cateReposi;
    protected $articleReposi;
    public function __construct(CategoryRepositoryEloquent $cateReposi, ArticleRepositoryEloquent $articleReposi){
        $this->cateReposi = $cateReposi;
        $this->articleReposi = $articleReposi;
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
                'slug_cate' => str_slug($request->slug),
                'parent_id' => $request->parent_id,
                'description_cate' => $request->description,
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
                'slug_cate' => str_slug($request->slug),
                'description_cate' => $request->description,
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
        $cate = $this->cateReposi->find($id);
        if ($cate != null) {
            $articlesOfCate = $this->articleReposi->findByField('cate_id', $id);
            foreach ($articlesOfCate as $art) {
                $this->articleReposi->update([
                        'cate_id' => 1
                    ], $art->id);
            }
            $cate->delete();
            return redirect()->route('category.index')->with(['flash_message' => 'Xóa danh mục thành công!', 'flash_level' => 'success']);
        }
        return redirect()->route('category.index')->with(['flash_message' => 'Không tìm thấy danh mục!', 'flash_level' => 'danger']);
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
            $countSlug = count($this->cateReposi->findWhere(['slug_cate' => $slug]));
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

    public function destroyListId()
    {
        if (isset($_GET['listId'])) {
            foreach ($_GET['listId'] as $id) {
                $cate = $this->cateReposi->find($id);
                if ($cate != null) {
                    $articlesOfCate = $this->articleReposi->findByField('cate_id', $id);
                    foreach ($articlesOfCate as $art) {
                        $this->articleReposi->update([
                                'cate_id' => 1
                            ], $art->id);
                    }
                    $cate->delete();
                }
            }
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

}
