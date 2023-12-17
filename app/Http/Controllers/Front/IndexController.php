<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

// CMS
use App\Models\Article;
use App\Models\Inline;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('date', 'desc')->paginate(10);
        $slider = Slider::orderBy('sort')->get();

        return view('front.homepage.index', [
            'array' => Inline::getElements(1),
            'articles' => $articles,
            'slider' => $slider]
        );
    }
}
