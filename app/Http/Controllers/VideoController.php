<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function getVideo()
    {
        $video = Video::get();
        $videos = Video::get();
        return view('video', compact('video', 'videos'));
    }

    public function addVideo(Request $request)
    {
        $c_image = $request->file('image');
        $image = Str::random(20);
        $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image . '.' . $ext;
        $upload_path = 'images/video/';
        $save_url_image = $upload_path . $image_full_name;
        $success = $c_image->move($upload_path, $image_full_name);

        Video::insert([
            'link' => $request->link,
            'image' => $save_url_image,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('video');
    }

    public function editVideo($id)
    {
        $item = Video::where('id', $id)->first();
        return view('editVideo', compact('item'));
    }

    public function updateVideo(Request $request, $id)
    {
        $item = Video::where('id', $id)->first();
        if ($request->file('image')) {
            unlink($item->image);
            $c_image = $request->file('image');
            $image = Str::random(20);
            $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image . '.' . $ext;
            $upload_path = 'images/video/';
            $save_url_image = $upload_path . $image_full_name;
            $success = $c_image->move($upload_path, $image_full_name);
            $item->update([
                'link' => $request->link,
                'image' => $save_url_image,
            ]);
            return redirect()->route('video');
        } else {
            $item->update([
                'link' => $request->link,
            ]);
            return redirect()->route('video');
        }
    }

    public function deleteVideo($id)
    {
        $post = Video::where('id', $id)->first();
        $post->delete();
        unlink($post->image);
        return redirect()->route('video');
    }
}
