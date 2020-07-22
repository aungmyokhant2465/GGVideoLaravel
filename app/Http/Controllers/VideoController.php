<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function getAdd() {
        $category = Category::get();
        $video = Video::orderBy('id','desc')->paginate(2);
        return view('View.Video')->with(['categories'=>$category,'videos'=>$video]);
    }
    public function postAdd(Request $request) {
        $this->validate($request, [
            'videoPhoto'=>'required|mimes:jpg,png,jpeg,gif',
            'title'=>'required',
            'link'=>'required',
            'category'=>'required'
        ]);
        $video_photo_name = date('d.m.y.h.i.s').'.'.$request->file('videoPhoto')->getClientOriginalName();
        Storage::disk('image')->put($video_photo_name, File::get($request->file('videoPhoto')));
        //dd($video_photo_name);
        $video = new Video();
        $video->title = $request['title'];
        $video->link = $request['link'];
        $video->category_id = $request['category'];
        $video->rating = $request['rate'];
        $video->description = $request['description'];
        $video->video_photo = $video_photo_name;
        $video->link_type = $request['link_type'] || 0;
        $video->save();
        return redirect()->back()->with('info',"The video have been uploaded.");
    }
    public function  getRemove($video_id) {
        $video = Video::whereId($video_id)->firstOrFail();
        $video->delete();
        Storage::disk('image')->delete($video->video_photo);
        return redirect()->back()->with('info',"The ".$video->title." video have been removed.");
    }
    public function postEdit(Request $request) {
        $video = Video::whereId($request['id'])->first();
        if($request['videoPhoto']){
            $oldPhoto = $request['oldPhoto'];
            Storage::disk('image')->delete($oldPhoto);
            $video_photo_name = date('d.m.y.h.i.s').'.'.$request->file('videoPhoto')->getClientOriginalName();
            Storage::disk('image')->put($video_photo_name, File::get($request->file('videoPhoto')));
            $video->video_photo = $video_photo_name;
        }
        $video->title = $request['title'];
        $video->link = $request['link'];
        $video->category_id = $request['category'];
        $video->rating = $request['rate'];
        $video->description = $request['description'];
        $video->link_type = $request['link_type'] || 0;
        $video->update();
        return redirect()->back()->with('info',"The video have been updated.");
    }
    public function getImage($image_name) {
        $image = Storage::disk('image')->get($image_name);
        return $image;
    }
}
