<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\CategoryRepositoryEloquent;

class HomeController extends Controller
{
    protected $articleRepository;
	protected $cateRepository;
/**
 * get Model
 * @param ArticleRepositoryEloquent $articleRepository [Article Model]
 */
	public function __construct(ArticleRepositoryEloquent $articleRepository, CategoryRepositoryEloquent $cateRepository)
	{
        $this->articleRepository = $articleRepository;
		$this->cateRepository = $cateRepository;
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
    	 * get three HOT article
    	 */
    	$hotNews = $allArticles->findWhere(['status' => 1, 'hot' => 1])->take(10);

    	/**
    	 * get all article new
    	 */
		$news = $allArticles->findByField('status', 1);

        $cateHead = $this->cateRepository->findByField('cate_name', 'Xã hội')->first();
        $newsHead = $allArticles->findWhere(['status' => 1, 'cate_id' => $cateHead->id]);

    	return view('home', compact('hotNews', 'news', 'newsHead'));
    }

    public function single($slug)
    {
    	$article = $this->articleRepository->findByField('slug', $slug)->first();
    	if ($article) {
    		var_dump($article);
    	} else {
    		return view('notfound');
    	}
    }
}
