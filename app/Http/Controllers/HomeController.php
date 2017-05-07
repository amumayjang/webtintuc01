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
    	$articlesHot = $this->articleRepository->findByField('hot', 1)->sortByDesc('time_public')->take(3);
    	return view('home', compact('articlesHot'));
    }
}
