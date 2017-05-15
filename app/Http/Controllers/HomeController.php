<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\CommentRepositoryEloquent;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $articleRepository;
    protected $cateRepository;
	protected $commentRepository;
	public function __construct(ArticleRepositoryEloquent $articleRepository, CategoryRepositoryEloquent $cateRepository, CommentRepositoryEloquent $commentRepository)
	{
        $this->articleRepository = $articleRepository;
        $this->cateRepository = $cateRepository;
		$this->commentRepository = $commentRepository;
	}

    public function index()
    {
        //list cate need show in home page
        $cates = [2, 3, 4];
        //get new post
        $newPosts = NewPosts(3);
        //get post in list cate show in home page
        $postInCates = [];
        for ($i=0; $i < count($cates); $i++) { 
            $postInCates[$i] = GetPostInCate($cates[$i], 5);
        }
        //get popular post
        $postPopular = PopularPost(3);
        //get new comments
        $newComments = NewComments(5);
        //get all category
        $cateAll = $this->cateRepository->all();
    	return view('home', compact('newPosts', 'postInCates', 'postPopular', 'newComments', 'cateAll'));
    }
    /**
     * [single show article on signle page]
     * @param  [type] $slug [slug of article]
     * @return [type]       [view]
     */
    public function single($slug)
    {
    	$post = DB::table('articles')
                    ->join('categories', 'articles.cate_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.id', 'articles.title', 'articles.content', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'categories.cate_name', 'categories.slug_cate', 'users.name')
                    ->where('articles.slug', $slug)
                    ->first();
        $tagOfPost = DB::table('article_tags')
                    ->join('tags', 'article_tags.tag_id', '=', 'tags.id')
                    ->select('tags.name_tag', 'tags.id')
                    ->where('article_tags.article_id', $post->id)
                    ->get();
        $commentOfPost = DB::table('comments')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->select('comments.id' , 'comments.content_cmt', 'users.name', 'users.avatar')
                    ->orderBy('comments.created_at', 'DESC')
                    ->where('comments.article_id', $post->id)
                    ->get();
        $idTagOfPost = [];
        foreach ($tagOfPost as $item) {
            array_push($idTagOfPost, $item->id);
        }
        $relatePosts = RelatePosts($post->id, $idTagOfPost, $post->slug_cate, 3);
        $newPosts = NewPosts(8);
        $postHot = HotPost(3);
        $popularPost = PopularPost(3);
    	if ($post) {
    		return view('front.single', compact('post', 'newPosts', 'commentOfPost', 'tagOfPost', 'relatePosts', 'postHot', 'popularPost'));
    	}
        return view('notfound');
    }
    /**
     * [postComment create comment from signle page]
     * @param  Request $request [description]
     * @return [type]           [back previours page]
     */
    public function postComment(Request $request)
    {
        $this->commentRepository->create([
                'content_cmt' => $request->comment,
                'user_id' => $request->user_id,
                'article_id' => $request->article_id,
            ]);
        return redirect()->back();
    }
    /**
     * [show post of category in archive page]
     * @param  [type] $slug [slug of category]
     * @return [type]       [archive page]
     */
    public function category($slug)
    {
        $postInCate = DB::table('articles')
                    ->join('categories', 'articles.cate_id', '=', 'categories.id')
                    ->join('users', 'articles.user_id', '=', 'users.id')
                    ->select('articles.id', 'articles.title', 'articles.slug', 'articles.view', 'articles.imgThumb', 'articles.time_public', 'articles.description', 'categories.cate_name', 'categories.slug_cate', 'users.name')
                    ->orderBy('articles.time_public', 'DESC')
                    ->where('articles.status', 1)
                    ->where('categories.slug_cate', $slug)
                    ->paginate(4);
        $newPosts = NewPosts(8);
        $postHot = HotPost(3);
        $popularPost = PopularPost(3);
        return view('front.archive', compact('newPosts', 'postInCate', 'postHot', 'popularPost'));
    }

    public function tag()
    {
        return view('front.tag');
    }

}
