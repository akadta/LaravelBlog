<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>CHANGE DETAILS</h1>
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
    <form method="post" action="{{ route('admin.changedetails') }}">
        @csrf
        <p>New name :<input type="text" name="new_name" placeholder="NEW NAME" required></p>
        <p>New email :<input type="email" name="new_email" placeholder="NEW EMAIL" required></p>
        <input type="submit" value="change details">
</form>
<p>BACK TO MAIN PAGE <a href="{{ route('admin.dashboard') }}">DASHBOARD</a></p>
    
</body>
</html>