<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\CommentRepositoryEloquent;

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
        /**
         * get all article and sort descending follow time_public field
         */
        $allArticles = $this->articleRepository->scopeQuery(function($query){
            return $query->orderBy('time_public', 'desc');
        });
    	/**
    	 * get HOT article
    	 */
    	$hotNews = $allArticles->findWhere(['status' => 1, 'hot' => 1])->take(10);

    	/**
    	 * get all article new
    	 */
		$news = $allArticles->findByField('status', 1);
        $popularNews = $this->articleRepository->scopeQuery(function($query){
            return $query->orderBy('view', 'desc');
        })->findByField('status', 1);

        $cateHead = $this->cateRepository->findByField('cate_name', 'Xã hội')->first();
        $newsHead = $allArticles->findWhere(['status' => 1, 'cate_id' => $cateHead->id]);

        $cateSecond = $this->cateRepository->findByField('cate_name', 'Kinh tế')->first();
        $newsSecond = $allArticles->findWhere(['status' => 1, 'cate_id' => $cateSecond->id]);

        $cateBot = $this->cateRepository->findByField('cate_name', 'Thể thao')->first();
        $newsBot = $allArticles->findWhere(['status' => 1, 'cate_id' => $cateBot->id]);

    	return view('home', compact('hotNews', 'news', 'newsHead', 'newsSecond', 'newsBot', 'popularNews'));
    }
    /**
     * [single show article on signle page]
     * @param  [type] $slug [slug of article]
     * @return [type]       [view]
     */
    public function single($slug)
    {
    	$news = $this->articleRepository->findByField('slug', $slug)->first();
        $recentNews = $this->articleRepository->scopeQuery(function($query) {
            return $query->orderBy('time_public', 'desc');
        })->all();
        $comments = $this->commentRepository->scopeQuery(function($query) {
            return $query->orderBy('created_at', 'desc');
        })->all();
    	if ($news) {
    		return view('single', compact('news', 'recentNews', 'comments'));
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

}
