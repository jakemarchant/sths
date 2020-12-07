<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use \App\Models\Media;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function upload($file, $filetype, $type = null, $type_id = null, $directory, $count = 0)
    {
        if( ! $directory ){
            $directory = 'images/misc';
        }

        if ( ! is_dir($directory) ) { // Does this directory exist?
            $old_mask = umask(0);
            mkdir($directory, 0777, true); // Create it.
            umask($old_mask);
        }

        $old_filename = $file->getClientOriginalName(); // What is the file called...
        $ext = $file->getClientOriginalExtension(); // What is the file type?

        $filename = 'Save_The_Highstreet'.date('Y_m_d_H_i_s_u') . '_' . $count . '.' . $ext; // Create new filename matching SEO rules.

        try { // Lets move the file
            $file->move($directory, $filename);
        } catch (\Exception $e) { // An error has occurred...
            // echo 'Your file could not be uploaded at this time. ';
        }

        $type = $type.'_id';

        $media = new Media; // Make sure we put the image in our media table

        if($type){
            $media->type = $type;
            $media->type_id = $type_id;
        }

        $media->filetype = $filetype;
        $media->filename = env('APP_URL') . '/' . $directory . '/' . $filename;
        $media->active = '1';

        $media->save(); // Save changes to the database..

    }
}
