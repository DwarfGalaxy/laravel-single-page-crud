 {{-- Add Blogs --}}
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogs">
     Add Blog
 </button>

 <!-- Modal to add Blogs -->
 <div class="modal fade" id="addBlogs" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addBlogsLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="addBlogsLabel">Add Blog</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                     @csrf
                     {{-- title --}}
                     <div class="mb-3">
                         <label for="title" class="form-label">Title</label>
                         <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                         @if ($errors->has('title'))
                         <span class="text-danger">{{$errors->first('title')}}</span>
                         @endif
                     </div>
                     {{-- slug --}}
                     <div class="mb-3">
                         <label for="slug" class="form-label">slug</label>
                         <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                         @if ($errors->has('slug'))
                         <span class="text-danger">{{$errors->first('slug')}}</span>
                         @endif
                     </div>
                     {{-- description --}}
                     <div class="mb-3">
                         <label for="description" class="form-label">Description</label>
                         <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
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
                 <button type="submit" class="btn btn-primary">Save</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 @section('script')
 @if($errors->any())
 <script>
     var myModal = new bootstrap.Modal(document.getElementById('addBlogs'));
     myModal.show();

 </script>
 @endif

 {{-- call method when modal closed to empty input fields--}}
 <script>
     document.getElementById("addBlogs").addEventListener("hidden.bs.modal", function() {
         document.getElementById('title').value = '';
         document.getElementById('slug').value = '';
         document.getElementById('description').value = '';
     });

 </script>
 @endsection
