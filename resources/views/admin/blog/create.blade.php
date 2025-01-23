<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:lightgreen;
        }
        .m{

            width:50%;
            position:relative;
            left:25%;
        }
    </style>
</head>
<body>
<div>
<p>BACK TO MAIN PAGE <a href="{{ route('admin.dashboard') }}">DASHBOARD</a></p>
<p>SHOW ALL BLOG WITH COMMENT <a href="{{ route('admin.showblog') }}">SHOW ALL</a></p>
<h2><a href="{{ route('admin.manage') }}">MANAGE COMMENTS</a></h2>
    <div class="m">
    <center><marquee>WELCOME TO THE BLOG UPLOADING SECTION</marquee></center>
    </div>
    <h1><u><b><i>CREATE YOUR BLOG</i></b></u></h1>
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
    <form method="post" action="{{ url('/admin.blog') }}" enctype="multipart/form-data">
        @csrf 
        <h2> No : <input type="number" name="no" required></h2>
        <label><u>TITLE</u></label><br>
        <input type="text" name="title" required><br>
        <h2><i> IMAGE : <input type="file" accept="image/*" name="image"><i></h2><br>
        <label>DESCRIPTION</label><br>
        <textarea name="description"></textarea><br>
        <input type="submit" value="P O S T">
</form>
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
    <table>
        <tr>
            <td><a href="{{ route('admin.editblog',$post->id) }}">EDIT</td>
            <th>&nbsp</th>
            <td>
                <form method="post" action="{{ route('admin.deleteblog',$post->id) }}">
                    @csrf 
                    @method('delete')
                    <button type="submit">DELETE</button>
    </form>
            </td>
        </tr>
    </table>
    @endforeach
</div>
    
</body>
</html>