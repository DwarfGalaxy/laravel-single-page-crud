
   <!-- Modal to update Blogs -->
   <div class="modal fade" id="updateBlogs" tabindex="-1" data-bs-backdrop="static" aria-labelledby="updateBlogsLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="updateBlogsLabel">Update Blog</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{route('blogs.update',$blog)}}" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             {{-- title --}}
             <div class="mb-3">
               <label for="updateTitle" class="form-label">Title</label>
               <input type="text" class="form-control" id="updateTitle" name="title" value="">
               @if ($errors->has('title'))
               <span class="text-danger">{{$errors->first('title')}}</span>
              @endif
             </div>
             {{-- slug --}}
             <div class="mb-3">
               <label for="updateSlug" class="form-label">slug</label>
               <input type="text" class="form-control" id="updateSlug" name="slug" value="">
               @if ($errors->has('slug'))
               <span class="text-danger">{{$errors->first('slug')}}</span>
           @endif
             </div>
             {{-- description --}}
             <div class="mb-3">
               <label for="updateDescription" class="form-label">Description</label>
               <textarea class="form-control"  id="updateDescription" name="description"></textarea>
               @if ($errors->has('description'))
               <span class="text-danger">{{$errors->first('description')}}</span>
            @endif
             </div>
             {{-- image --}}
             <div class="mb-3">
               <label for="image" class="form-label">image</label>
               <input type="file" class="form-control" name="image" id="image">
               @if ($errors->has('image'))
               <span class="text-danger">{{$errors->first('image')}}</span>
              @endif
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary" >Save</button>
         </div>
       </form>
       </div>
     </div>
   </div>

   @section('script')
   {{-- to display error --}}
   @if($errors->any())
   <script>
      var myModal = new bootstrap.Modal(document.getElementById('updateBlogs'));
       myModal.show();
   </script>
   @endif

  
   @endsection
