<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;

class ImageGalleryController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = ImageGallery::get();
        return view('image-gallery', compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //Gets the IP Address from the visitor
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $json     = file_get_contents("http://ipinfo.io/$ip/geo");
        //Breaks down the JSON object into an array
        $json     = json_decode($json, true);

        //This variable is the visitor's city
        if (!empty($json['city'])) {
            $input['location'] = $json['city'];
        } else {
            $input['location'] = '';
        }
            
        $input['image_name'] = $request->image->getClientOriginalName(); //Getting original name
        $input['image_extention'] = $request->image->getClientOriginalExtension(); //Getting extension
        $input['image'] = time() . '.' . $request->image->getClientOriginalExtension(); //creating file path name
        $data = getimagesize($request->image);
        $input['image_width'] = $data[0]; //Getting width
        $input['image_height'] = $data[1]; //Getting height

        $request->image->move(public_path('images'), $input['image']);
        $input['name'] = $request->name;
        //echo "<pre>";print_r($input);die;
        ImageGallery::create($input);


        return back()
            ->with('success', 'Image Uploaded successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ImageGallery::find($id)->delete();
        return back()
            ->with('success', 'Image removed successfully.');
    }
}
