<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>CHANGE PASSWORD</h1>
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
    <form method="post" action="{{ route('admin.changepassword') }}">
        @csrf
        <p>Current Password :<input type="password" name="current_password" placeholder="current password" required></p>
        <p>Current Password :<input type="password" name="new_password" placeholder="New password" required></p>
        <p>Current Password :<input type="password" name="new_password_confirmation" placeholder="Confirm" required></p>
        <input type="submit" value="change password">
</form>
<p>BACK TO MAIN PAGE <a href="{{ route('admin.dashboard') }}">DASHBOARD</a></p>
    
</body>
</html>