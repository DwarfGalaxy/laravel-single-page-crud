<?php

namespace App\Service;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogService{

     // =============POST============
     public function addService($request){
        // store single image in local storage folder
        if(isset($request['image'])){
            $timestamp=now()->timestamp;
            $originalName=$request['image']->getClientOriginalName();
            $imageName=$timestamp. '-' . $originalName;
            $request['image']->storeAs('public/images/blogs',$imageName);

            // update the image name in the $request array
            $request['image']=$imageName;
        };

        // store in database table
        Blog::create($request);
    }

    // ========GET(Read all)================
    public function fetchBlogs(){
        //    $blogs=Blog::paginate(10);  //Paginate with 10 records per page
        //    $blogs=Blog::where('published',true)->get(); //where published=true
        //    $blogs=Blog::select('SELECT * FROM blogs'); //raw sql
           $blogs=Blog::all(); //fetch all the records
        //    $blogs=Blog::with('blog_info')->get();  //fetch all data with one to one relation
        //    $blogs=Blog::with('blog_info')->paginate(10);  // fetch data relationship with one to one
           return $blogs;
        }

         // =========DELETE==========
    public function delete($blog){
        // delete image from local storage
        if(isset($blog->image)){
            Storage::delete('public/images/blogs/'.$blog->image);
        }
        // if cascade on delete not used:
        // $blog->blog_info->delete(); //delete child record
        // $blog->delete(); //delete parent record
        // if cascade on delete used:
        $blog->delete();
    }

     // ========FETCH(Single Blog)======
     public function singleBlog($blog){
        // $blogs=Blog::where('slug',$blog->slug)->first();
        return $blog;
    }

      // =======UPDATE(PUT)==============
      public function updateService($request, $blog){
        // Check if a new image is uploaded
        if(isset($request['image'])){
            // Delete the old image from storage folder
            Storage::delete('public/images/blogs/'.$blog->image);
            // Store the new image
            $timestamp = now()->timestamp;
            $originalName = $request['image']->getClientOriginalName();
            $imageName = $timestamp . '-' . $originalName;
            $request['image']->storeAs('public/images/blogs', $imageName);
            // Update the image name in the $request array
            $request['image'] = $imageName;
        } else {
            $request['image'] = $blog->image;
        }
    
        // update in db
        // $blog->update($request);
        
        Blog::where('id',$blog->id)->update($request);
    }
}
