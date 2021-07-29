<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelPost
 * @package App\Models
 */
class ModelPost extends Model {

    /**
     * @var string
     */
    protected $table = 'post';

    /**
     * @param $type
     * @return mixed
     */
    public static function getAllPublishedByType($type) {
        $response = ModelPost
            ::where('type', '=', $type)
            ->where('status', 'published')
            ->where('locale', App()->getLocale())
            ->orderBy('priority', 'desc')
            ->get();
        if ($response->isEmpty()) {
            $response = ModelPost
                ::where('type', '=', $type)
                ->where('status', 'published')
                ->where('locale', Config()->get('app.fallback_locale'))
                ->orderBy('priority', 'desc')
                ->get();
        }
        return $response;
    }

    /**
     * @return mixed
     */
    public static function getAllWorks() {
        return ModelPost::getAllPublishedByType('work');
    }

    /**
     * @return mixed
     */
    public static function getAllFeatured() {
        return ModelPost::getAllPublishedByType('home');
    }

    /**
     * @return mixed
     */
    public static function getAllPosts() {
        return ModelPost::getAllPublishedByType('post');
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function getPostBySlug($slug) {
        return ModelPost
            ::where('status', 'published')
            ->where('locale', App()->getLocale())
            ->where('slug', $slug)
            ->get();
    }

}

?>