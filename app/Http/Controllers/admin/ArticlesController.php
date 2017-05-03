<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\TagRepositoryEloquent;
use App\Repositories\ArticleTagRepositoryEloquent;
use Auth;


class ArticlesController extends Controller
{
    protected $cateReposi;
    protected $articlesReposi;
    public function __construct(CategoryRepositoryEloquent $cateReposi, ArticleRepositoryEloquent $articlesReposi, TagRepositoryEloquent $tagReposi, ArticleTagRepositoryEloquent $articleTagReposi){
        $this->cateReposi = $cateReposi;
        $this->articlesReposi = $articlesReposi;
        $this->tagReposi = $tagReposi;
        $this->articleTagReposi = $articleTagReposi;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articlesReposi->all();
        return view('admin.articles.manager', compact('articles'));
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
        $lastArticle = $this->articlesReposi->all()->last();
        if ($request->has('name_tags')) {
            $tags = preg_split('/[,]+/', $request->name_tags);
            foreach ($tags as $tag) {
                $tagCheck = $this->tagReposi->findByField('name_tag', $tag)->first();
                if ($tagCheck) {
                    $this->articleTagReposi->create([
                            'article_id' => $lastArticle->id,
                            'tag_id' => $tagCheck->id
                        ]);
                } else {
                    $this->tagReposi->create(['name_tag' => $tag]);
                    $lastTag = $this->tagReposi->all()->last();
                    $this->articleTagReposi->create([
                            'article_id' => $lastArticle->id,
                            'tag_id' => $lastTag->id
                        ]);
                }
            }
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
        $article = $this->articlesReposi->find($id);
        $cates = $this->cateReposi->all();
        $tags = '';
        foreach ($article->tags()->get() as $tag) {
            $tags .= $tag->name_tag.",";
        }
        return view('admin.articles.edit', compact('article', 'cates', 'tags'));
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
        $nameImage = '';
        $article = $this->articlesReposi->find($id);
        if ($request->hasFile('thumbnail_image')) {
            $nameImage = files_upload('public/admin/uploads/images/thumbnail-articles', $request->file('thumbnail_image'));
            unlink('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb);
        }
        $this->articlesReposi->update([
                'title' => $request->title,
                'content' => $request->content,
                'slug' => str_slug($request->title),
                'description' => substr(strip_tags($request->content), 0, 100),
                'cate_id' => $request->cate_id,
                'hot' => $request->hot,
                'imgThumb' => $nameImage,
            ], $id);
        $findOldTag = $this->articleTagReposi->findByField('article_id', $id);
        
        if ($request->has('name_tags')) {
            $tags = preg_split('/[,]+/', $request->name_tags);
            foreach ($tags as $tag) {
                $tagCheck = $this->tagReposi->findByField('name_tag', $tag)->first();
                if ($tagCheck) {
                    $this->articleTagReposi->create([
                            'article_id' => $id,
                            'tag_id' => $tagCheck->id
                        ]);
                } else {
                    $this->tagReposi->create(['name_tag' => $tag]);
                    $lastTag = $this->tagReposi->all()->last();
                    $this->articleTagReposi->create([
                            'article_id' => $id,
                            'tag_id' => $lastTag->id
                        ]);
                }
            }
        }
        
        return redirect()->route('articles.index');

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
