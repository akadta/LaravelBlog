<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
<p>BACK TO  BLOG PAGE <a href="{{ route('admin.blog') }}">BACK</a></p>
    
    <h1><u><b><i>EDIT YOUR POST</i></b></u></h1>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
    @endif
</div>
<div>
    @if(session()->has('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif
</div>
    <form method="post" action="{{ route('admin.updateblog',$post->id) }}" enctype="multipart/form-data">
        @csrf 
        @method('put')
        <h2> No : <input type="number" name="no" value="{{$post->no}}" required></h2>
        <label><u>TITLE</u></label><br>
        <input type="text" name="title" value="{{$post->title}}" required><br>
        <label>Current image</label><br>
        @if($post->image)
        <img src="{{ asset('storage/'. $post->image) }}" alt="Current image" width="300">
        @else
        <p>No image</p>
        @endif
        <h2><i> IMAGE : <input type="file" accept="image/*" name="image"><i></h2><br>
        <label>DESCRIPTION</label><br>
        <textarea name="description">{{$post->description}}</textarea><br>
        <input type="submit" value="UPDATE">
</form>
    
</body>
</html>