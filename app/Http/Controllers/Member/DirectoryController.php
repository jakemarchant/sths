<?php

namespace App\Http\Controllers\Member;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Models\Member\Members;
use \App\Models\Member\MembersDirectory;

class DirectoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function index()
    {
        $member = Auth::guard('member')->user();
        $directory = MembersDirectory::where('member_id', $member->member_id)->first();

        return view('members.directory.index')->withMember($member)->withDirectory($directory);
    }

    public function save(Request $request)
    {
        $member = Auth::guard('member')->user();

        $directory = new MembersDirectory;

        if(request('directory_id')){
            $directory = MembersDirectory::find(request('directory_id'));
        }

        $directory->member_id = $member->member->id;
        $directory->colour_1 = request('colour_1');
        $directory->colour_2 = request('colour_2');
        $directory->seo_title = request('seo_title');
        $directory->seo_description = request('seo_description');

        $directory->title = request('title');
        $directory->subtitle = request('subtitle');
        $directory->content_left = request('content_left');
        $directory->content_right = request('content_right');

        $directory->save();

        $folder = 'images/members/' . urlencode($member->member->id) . '/directory';
        if($request->file('images')){
            $image_count = 1;
            foreach($request->file('images') as $file){
                app('App\Http\Controllers\MediaController')->upload($file, 'image', 'directory', $directory->id, $folder, $image_count);
                $image_count++;
            }
        }

        return redirect('/member');

    }
}
