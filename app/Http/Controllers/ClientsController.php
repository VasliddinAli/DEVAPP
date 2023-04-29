<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientsController extends Controller
{
    public function getClients()
    {
        $clients = Clients::get();
        return view('clients', compact('clients'));
    }

    public function addClient(Request $request)
    {
        $c_image = $request->file('image');
        $image = Str::random(20);
        $ext = strtolower($c_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image . '.' . $ext;
        $upload_path = 'images/clients/';
        $save_url_image = $upload_path . $image_full_name;
        $success = $c_image->move($upload_path, $image_full_name);

        Clients::insert([
            'link' => $request->link,
            'image' => $save_url_image,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('clients');
    }

    public function editClient($id)
    {
        $client = Clients::where('id', $id)->first();
        return view('editClient', compact('client'));
    }

    public function updateClient(Request $request, $id)
    {
        $client = Clients::where('id', $id)->first();
        if ($request->file('image')) {
            unlink($client->image);
            $c_image = $request->file('image');
            $image = Str::random(20);
            $ext = strtolower($c_image->getClientOriginalExtension());
            $image_full_name = $image . '.' . $ext;
            $upload_path = 'images/clients/';
            $save_url_image = $upload_path . $image_full_name;
            $success = $c_image->move($upload_path, $image_full_name);
            $client->update([
                'link' => $request->link,
                'image' => $save_url_image,
            ]);
            return redirect()->route('clients');
        } else {
            $client->update([
                'link' => $request->link,
            ]);
            return redirect()->route('clients');
        }
    }

    public function deleteClient($id)
    {
        $post = Clients::where('id', $id)->first();
        $post->delete();
        unlink($post->image);
        return redirect()->route('clients');
    }
}
