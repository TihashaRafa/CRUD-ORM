<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function index(){
    return view('customer.index');
   }


   public function create(){
    return view('customer.create');
   }

   public function store(Request $request){

    dd($request);
        $request->validate([
        'title'                 => 'required',
        'description'           => 'required|string',
        'category'              => 'required|string',
        'tags'                  => 'required|array',
        'status'                => 'required|string',
        'featured_image'        => 'required|image',
        ]);


        //image upload
        if($request->hasFile('featured_image')){
         $image = $request->file('featured_image');
         $fileNameToStore = 'Customer_image'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('image'), $fileNameToStore);
        }

        Customer::create([
         'title'              => $request->title,
         'description'        => $request->description,
         'category'           => $request->category,
         'tags'               => $request->tags,
         'status'             => $request->status,
         'featured_image'     => $fileNameToStore,
        ]);
   }

   
   
}
