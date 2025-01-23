<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
    <h1>REGISTER</h1>
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
    <form method="post" action="{{ route('register') }}">
        @csrf 
        <label>USER NAME</label><br>
        <input type="text" name="name" required><br>
        <label>EMAIL</label><br>
        <input type="email" name="email" required><br>
        <label>PASSWORD</label><br>
        <input type="password" name="password" required><br>
        <label>CONFIRM PASSWORD</label><br>
        <input type="password" name="password_confirmation" required><br>
        <label>ROLE</label>
        <select name="role">
            <option value=""disable selected>SELECT</option>
            <option value="admin">A D M I N</option>
            <option value="user">U S E R</option>
</select><br>
<input type="submit" value="REGISTER">
</form>
<p>Already have an account ? <a href="{{ route('loginform') }}">log in</a></p>
    
</body>
</html>