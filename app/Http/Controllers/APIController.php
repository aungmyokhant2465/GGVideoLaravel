<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;
use Illuminate\Support\Facades\Storage;

class APIController extends Controller
{
    public function getVideos()
    {
        $videos = Video::OrderBy('id','desc')->paginate(6);
        return response()->json($videos);
    }
    public function getVideo($id) {
        $video = Video::whereId($id)->first();
        return response()->json($video);
    }
    public function getCategories() {
        $category = Category::all();
        return response()->json($category);
    }
    public function getImages($image_name) {
        $image = Storage::disk('image')->get($image_name);
        return response($image)->header('Content-type','image/*');
    }
    public function  getVideoByCat($category_id) {
        $videos = Video::whereCategoryId($category_id)->paginate(2);
        return response()->json($videos);
    }
}
