<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Member\Members;
use \App\Models\Member\MembersLocations;
use \App\Models\Member\MembersDirectory;

class DirectoryController extends Controller
{

    public function manage(Request $request, $member_title, $member_id, $page = null)
    {

        $type = urldecode($page);

        $member = Members::find($member_id);
        $directory = MembersDirectory::where('member_id', $member->id)->first();

        switch ($type) {
            case 'welcome':

                return view('website.index')->withClient($member);

            break;

            case 'shop':

            return view('website.shop')->withClient($member);

            break;
        }

    }


}
