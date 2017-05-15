<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\TagRepositoryEloquent;
use App\Repositories\ArticleTagRepositoryEloquent;
use App\Repositories\CommentRepositoryEloquent;
use Auth;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;


class ArticlesController extends Controller
{
    protected $cateReposi;
    protected $articlesReposi;
    protected $tagReposi;
    protected $articleTagReposi;
    protected $commentReposi;

    /**
     * @param Category Model
     * @param Article Model
     * @param Tag Model
     * @param ArticleTag Model
     * @param Comment Model
     */
    public function __construct(CategoryRepositoryEloquent $cateReposi, ArticleRepositoryEloquent $articlesReposi, TagRepositoryEloquent $tagReposi, ArticleTagRepositoryEloquent $articleTagReposi, CommentRepositoryEloquent $commentReposi){
        $this->cateReposi = $cateReposi;
        $this->articlesReposi = $articlesReposi;
        $this->tagReposi = $tagReposi;
        $this->articleTagReposi = $articleTagReposi;
        $this->commentReposi = $commentReposi;
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
        $tags = $this->tagReposi->all();
        $time = date("Y-m-d G:i");
        return view('admin.articles.add', compact('cates', 'time', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        $nameImage = '';
        //upload file image thumbnail of article and return name file
        if ($request->hasFile('thumbnail')) {
            $nameImage = files_upload('public/admin/uploads/images/thumbnail-articles', $request->file('thumbnail'));
        }
        $timePublic = $request->time_public;
        $status = strtotime($timePublic) <= strtotime("now") ? 1 : 0;
        //create article
        $this->articlesReposi->create([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'slug' => str_slug($request->slug),
                'user_id' => Auth::id(),
                'cate_id' => $request->cate_id,
                'time_public' => $timePublic,
                'hot' => $request->hot,
                'imgThumb' => $nameImage,
                'status' => $status
            ]);
        //get current article
        $lastArticle = $this->articlesReposi->all()->last();
        //create tag of article
        if ($request->has('name_tag')) {
            foreach ($request->name_tag as $tag) {
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
        return redirect()->route('articles.index')->with(['flash_message' => 'Thêm bài viết thành công!', 'flash_level' => 'success']);
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
        $tags = $this->tagReposi->all();
        $comments = $this->commentReposi->findByField('article_id', $id);
        return view('admin.articles.edit', compact('article', 'cates', 'tags', 'comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = $this->articlesReposi->find($id);//find article need update
        //update artilce
        $this->articlesReposi->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'slug' => str_slug($request->slug),
                'cate_id' => $request->cate_id,
                'hot' => $request->hot,
            ], $id);
        //update thumbnail image
        if ($request->hasFile('thumbnail')) {
            $nameImage = files_upload('public/admin/uploads/images/thumbnail-articles', $request->file('thumbnail'));
            if ($article->imgThumb != "") {
                unlink('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb);
            }
            $this->articlesReposi->update([
                    'imgThumb' => $nameImage
                ], $id);
        }
        //find old tag of article and delete that tag 
        $findOldTag = $this->articleTagReposi->findByField('article_id', $id);
        foreach ($findOldTag as $tag) {
            $tag->delete();
        }
        //create new tag for article
        if ($request->has('name_tag')) {
            foreach ($request->name_tag as $tag) {
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
        return redirect()->route('articles.index')->with(['flash_message' => 'Cập nhật bài viết thành công!', 'flash_level' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->articlesReposi->find($id);
        if ($article != null) {
            if ($article->imgThumb != null && file_exists('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb)) {
                unlink('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb);
            }
            $article->delete();
            $commentOfArticle = $this->commentReposi->findByField('article_id', $id);
            foreach ($commentOfArticle as $cmt) {
                $cmt->delete();
            }
            return redirect()->route('articles.index')->with(['flash_message' => 'Xóa bài viết thành công!', 'flash_level' => 'success']);
        }
        return redirect()->route('articles.index')->with(['flash_message' => 'Không tìm thấy bài viết!', 'flash_level' => 'danger']);
    }

    /**
     * Check and Create the slug of article from string input.
     *
     * @param 
     * @return json: true and slug if slug doesn't exist and false if slug exist
     */
    public function makeSlug()
    {

        if (isset($_GET['str'])) {
            $str = $_GET['str'];
            $slug = str_slug($str);
            //Check slug in articles table
            $slugCheck = $this->articlesReposi->findByField('slug', $slug)->first();
            //if has slug in articles table => return false else => return true and slug
            if ($slugCheck) {
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
                $article = $this->articlesReposi->find($id);
                if ($article != null) {
                    if ($article->imgThumb != null && file_exists('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb)) {
                        unlink('public/admin/uploads/images/thumbnail-articles/'.$article->imgThumb);
                    }
                    $article->delete($id);
                    $commentOfArticle = $this->commentReposi->findByField('article_id', $id);
                    foreach ($commentOfArticle as $cmt) {
                        $cmt->delete();
                    }
                }
            }
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
