<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2><a href="{{ route('admin.blog') }}">BACK TO BLOG CREATE</a></h2>
<h2><a href="{{ route('admin.manage') }}">MANAGE COMMENTS</a></h2>
 <div>
 @foreach($posts as $post)
    <h2> No : {{$post->no}}</h2>
    <h1><u> TITLE </u></h1>
    <h2>{{$post->title}}</h2>
    @if($post->image)
    <img src="{{ asset('storage/'. $post->image) }}" alt="Image Of {{$post->title}}" width="300">
    @else
    <p>No image</p>
    @endif
    <h3><u>DESCRIPTION</u></h3>
    <h2>{{$post->description}}</h2>
    <h2>Comments :</h2>
    @foreach($post->comment as $comment)

    <ul>
        <li><p>{{$comment->user->name}} :<strong>{{$comment->comment}}</strong></p></li>
    </ul>        

    @endforeach
    @endforeach

    {{$posts->links()}}
 </div>
    
</body>
</html>