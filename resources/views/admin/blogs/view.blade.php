<p>{{$blog->id}}</p>
<p>{{$blog->title}}</p>
<p>{{$blog->slug}}</p>
<p>{{$blog->description}}</p>
<p>
    <img  src="{{ asset('storage/images/blogs/'.$blog->image) }}" style="height: 30px" alt="{{$blog->image}}">
</p>