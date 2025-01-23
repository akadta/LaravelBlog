<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2><a href="{{ route('admin.blog') }}">BACK TO BLOG CREATE</a></h2>
    @foreach($posts as $post)
    <h1>POST NO : {{$post->no}}</h1>
    <h2>comments :</h2>
    @foreach($post->comment as $comment)
    <ul>
        <li><p>{{$comment->user->name}} :<strong>{{$comment->comment}}</strong></p></li>
    </ul>
    <td><form method="post" action="{{ route('admin.deletecomment',$comment->id) }}">
        @csrf 
        @method('delete')
        <button type="submit">DELETE</button>
</form>
    </td>
    @endforeach
    @endforeach

    {{$posts->links()}}
</body>
</html>