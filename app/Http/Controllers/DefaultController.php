<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Member\Members;

class DefaultController extends Controller
{

    public function collectionPaginate($collection, $perPage, $url)
    {

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentPageItems = $collection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($collection), $perPage);

        $paginatedItems->setPath($url);

        return $paginatedItems;

    }

    public function index(Request $request)
    {
        $members = $this->collectionPaginate(Members::orderBy('title')->get(), 12, $request->url());

        return view('default.home')->withShops($members);
    }
}
