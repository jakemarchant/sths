<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use Auth;

use \App\Http\Controllers\Controller;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function index()
    {
        $member = Auth::guard('member')->user();

        return view('members.dashboard')->withMember($member);
    }

}
