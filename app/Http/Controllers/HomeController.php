<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryEloquent;

class HomeController extends Controller
{
	protected $articleRepository;
/**
 * get Model
 * @param ArticleRepositoryEloquent $articleRepository [Article Model]
 */
	public function __construct(ArticleRepositoryEloquent $articleRepository)
	{
		$this->articleRepository = $articleRepository;
	}

    public function index()
    {
    	/**
    	 * get three HOT article and sort descending follow time_public field
    	 */
    	$articlesHot = $this->articleRepository->scopeQuery(function($query){
    		return $query->orderBy('time_public','desc');
		})->findByField('hot', 1)->take(3);

    	/**
    	 * get article and sort descending follow time_public field
    	 */
		$articles = $this->articleRepository->scopeQuery(function($query){
			return $query->orderBy('time_public', 'desc');
		})->all()->take(5);

		
    	return view('home', compact('articlesHot', 'articles'));
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
