<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ArticleRepositoryEloquent;
use Auth;


class ArticlesController extends Controller
{
    protected $cateReposi;
    protected $articlesReposi;
    public function __construct(CategoryRepositoryEloquent $cateReposi, ArticleRepositoryEloquent $articlesReposi){
        $this->cateReposi = $cateReposi;
        $this->articlesReposi = $articlesReposi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = $this->cateReposi->all();
        $time = date("Y-m-d G:i");
        return view('admin.articles.add', compact('cates', 'time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameImage = '';
        if ($request->hasFile('thumbnail_image')) {
            $nameImage = files_upload('public/admin/uploads/images/thumbnail-articles', $request->file('thumbnail_image'));
        }
        $this->articlesReposi->create([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => str_slug($request->title),
                'description' => substr(strip_tags($request->content), 0, 100),
                'user_id' => Auth::id(),
                'cate_id' => $request->cate_id,
                'time_public' => $request->time_public,
                'hot' => $request->hot,
                'imgThumb' => $nameImage,
            ]);
        if ($request->has('name_tags')) {
            $tags = $request->name_tags;
            var_dump($tags);
        }
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
}
