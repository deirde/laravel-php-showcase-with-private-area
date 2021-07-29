<?php

namespace App\Http\Controllers;

use App\Models\ModelPost;
use Illuminate\Http\Request;
use Validator;

/**
 * Class SiteController
 *
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        return redirect(App()->getLocale());
    }

    /**
     * @param $locale
     *
     * @return mixed
     */
    public function home($locale)
    {
        $post = ModelPost::getAllFeatured();
        if ($post->isEmpty()) {
            App()->abort(404);
        }
        return view(
            'home', array(
            'meta'  => __('meta.home'),
            'posts' => $post
        )
        );
    }

    /**
     * @param $locale
     *
     * @return mixed
     */
    public function blog($locale)
    {
        $post = ModelPost::getAllPosts();
        if ($post->isEmpty()) {
            App()->abort(404);
        }
        return view(
            'blog', array(
            'meta'  => __('meta.blog'),
            'posts' => $post
        )
        );
    }

    /**
     * @param $locale
     *
     * @return mixed
     */
    public function works($locale)
    {
        $post = ModelPost::getAllWorks();
        if ($post->isEmpty()) {
            App()->abort(404);
        }
        return view(
            'works', array(
            'meta'  => __('meta.works'),
            'posts' => $post
        )
        );
    }

    /**
     * @param $locale
     * @param $slug
     *
     * @return mixed
     */
    public function post($locale, $slug)
    {
        $post = ModelPost::getPostBySlug($slug);
        if ($post->isEmpty()) {
            App()->abort(404);
        }
        return view(
            'post', array(
            'meta' => __('meta.works'),
            'post' => $post
        )
        );
    }

}

?>