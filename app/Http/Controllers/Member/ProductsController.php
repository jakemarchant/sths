<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use \App\Models\Product\Products;
use \App\Models\Product\ProductsAttributes;
use \App\Models\Product\ProductsCategories;

use \App\Models\Media;

use Auth;

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function index()
    {
        $member = Auth::guard('member')->user();

        return view('members.products.index')->withMember($member);
    }

    public function create()
    {
        $member = Auth::guard('member')->user();

        return view('members.products.create')->withMember($member);
    }

    public function edit($id)
    {
        $member = Auth::guard('member')->user();
        $product = Products::find($id);

        return view('members.products.edit')->withMember($member)->withProduct($product);
    }

    public function save(Request $request)
    {
        $member = Auth::guard('member')->user();

        $product = new Products;

        if(request('product_id')){
            $product = Products::find(request('product_id'));
        }

        $product->member_id = $member->id;
        $product->title = request('title');
        $product->description = request('description');
        $product->price = request('price');
        $product->quantity = request('stock');

        $product->save();

        $categories = array('category_1', 'category_2', 'category_3');
        foreach($categories as $category){
            if(request($category)){

                $product_category = new ProductsCategories;
                $product_category->product_id = $product->id;
                $product_category->category_id = $category;
                $product_category->save();

            }
        }

        $directory = 'images/members/' . urlencode($member->member->id) . '/products/' . urlencode($product->id);

        if($request->file('images')){
            $image_count = 1;
            foreach($request->file('images') as $file){
                app('App\Http\Controllers\MediaController')->upload($file, 'image', 'product', $product->id, $directory, $image_count);
                $image_count++;
            }
        }

        return redirect('/member/products');
    }

}
