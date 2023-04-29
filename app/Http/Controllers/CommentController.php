<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function getComments()
    {
        $comments = Comment::get();
        return view('comments', compact('comments'));
    }

    public function addComment(Request $request)
    {
        $c_image = $request->file('image');
        $image = Str::random(20);
        $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image . '.' . $ext;
        $upload_path = 'images/comments/';
        $save_url_image = $upload_path . $image_full_name;
        $success = $c_image->move($upload_path, $image_full_name);

        Comment::insert([
            'name' => $request->name,
            'job' => $request->job,
            'comment' => $request->comment,
            'image' => $save_url_image,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('comments');
    }

    public function editComment($id)
    {
        $item = Comment::where('id', $id)->first();
        return view('editComment', compact('item'));
    }

    public function updateComment(Request $request, $id)
    {
        $item = Comment::where('id', $id)->first();
        if ($request->file('image')) {
            unlink($item->image);
            $c_image = $request->file('image');
            $image = Str::random(20);
            $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image . '.' . $ext;
            $upload_path = 'images/comments/';
            $save_url_image = $upload_path . $image_full_name;
            $success = $c_image->move($upload_path, $image_full_name);
            $item->update([
                'name' => $request->name,
                'job' => $request->job,
                'comment' => $request->comment,
                'image' => $save_url_image,
            ]);
            return redirect()->route('comments');
        } else {
            $item->update([
                'name' => $request->name,
                'job' => $request->job,
                'comment' => $request->comment,
            ]);
            return redirect()->route('comments');
        }
    }

    public function deleteComment($id)
    {
        $post = Comment::where('id', $id)->first();
        $post->delete();
        unlink($post->image);
        return redirect()->route('comments');
    }
}
