<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>LOGIN</h1>
<div>
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
<div>
    @if(session()->has('error'))
    <div>
        {{ session('error') }}
    </div>
    @endif
</div>   
    <form method="post" action="{{ route('login') }}">
        @csrf 
        <label>EMAIL</label><br>
        <input type="email" name="email" required><br>
        <label>PASSWORD</label><br>
        <input type="password" name="password" required><br>
<input type="submit" value="LOGIN">
</form>
<p>Don't  have an account ? <a href="{{ route('registerform') }}">Register</a></p>
    
</body>
</html>