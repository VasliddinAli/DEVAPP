<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Comment;
use App\Models\Projects;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjetcsController extends Controller
{
    public function getProjects()
    {
        $project = Projects::get();
        $projects = Projects::get();
        return view('projects', compact('project', 'projects'));
    }
    
    public function getProjectsWeb()
    {
        $comments = Comment::get();
        $projects = Projects::get();
        $videos = Video::get();
        $clients = Clients::get();
        return view('welcome', compact('projects', 'comments', 'videos', 'clients'));
    }

    public function addProject(Request $request)
    {
        $c_image = $request->file('image');
        $image = Str::random(20);
        $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image . '.' . $ext;
        $upload_path = 'images/projects/';
        $save_url_image = $upload_path . $image_full_name;
        $success = $c_image->move($upload_path, $image_full_name);

        Projects::insert([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $save_url_image,
            'link' => $request->link,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('projects');
    }

    public function editProject($id)
    {
        $item = Projects::where('id', $id)->first();
        return view('editProject', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Projects::where('id', $id)->first();
        if ($request->file('image')) {
            unlink($item->image);
            $c_image = $request->file('image');
            $image = Str::random(20);
            $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $image_full_name = $image . '.' . $ext;
            $upload_path = 'images/projects/';
            $save_url_image = $upload_path . $image_full_name;
            $success = $c_image->move($upload_path, $image_full_name);

            $item->update([
                'name' => $request->name,
                'category' => $request->category,
                'link' => $request->link,
                'image' => $save_url_image
            ]);
            return redirect()->route('projects');
        } else {
            $item->update([
                'name' => $request->name,
                'category' => $request->category,
                'link' => $request->link
            ]);
            return redirect()->route('projects');
        }
    }

    public function deleteProject($id)
    {
        $post = Projects::where('id', $id)->first();
        $post->delete();
        unlink($post->image);
        return redirect()->route('projects');
    }
}
