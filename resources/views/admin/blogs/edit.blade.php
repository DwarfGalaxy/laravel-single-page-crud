
   <!-- Modal to update Blogs -->
   <div class="modal fade" id="updateBlogs" tabindex="-1" data-bs-backdrop="static" aria-labelledby="updateBlogsLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="updateBlogsLabel">Update Blog</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{route('blogs.update')}}" enctype="multipart/form-data" id="updateForm">
             @csrf
             @method('PUT')
             <input type="hidden" name="form_type" value="update">

             {{-- title --}}
             <div class="mb-3">
               <label for="updateTitle" class="form-label">Title</label>
               <input type="text" class="form-control" id="updateTitle" name="title" value="{{old('title')}}">
               @if ($errors->has('title'))
               <span class="text-danger error-msg">{{$errors->first('title')}}</span>
              @endif
             </div>
             {{-- slug --}}
             <div class="mb-3">
               <label for="updateSlug" class="form-label">slug</label>
               <input type="text" class="form-control" id="updateSlug" name="slug" value="{{old('slug')}}">
               @if ($errors->has('slug'))
               <span class="text-danger error-msg">{{$errors->first('slug')}}</span>
           @endif
             </div>
             {{-- description --}}
             <div class="mb-3">
               <label for="updateDescription" class="form-label">Description</label>
               <textarea class="form-control"  id="updateDescription" name="description">{{old('description')}}</textarea>
               @if ($errors->has('description'))
               <span class="text-danger error-msg">{{$errors->first('description')}}</span>
            @endif
             </div>
             {{-- image --}}
             <div class="mb-3">
               <label for="image" class="form-label">image</label>
               <input type="file" class="form-control" name="image" id="image">
               @if ($errors->has('image'))
               <span class="text-danger error-msg">{{$errors->first('image')}}</span>
              @endif
             </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Save</button>
         </div>
       </form>
       </div>
     </div>
   </div>