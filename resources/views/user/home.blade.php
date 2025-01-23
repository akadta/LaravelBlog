<h1> WELCOME USER {{Auth::user()->name}}</h1>
<div>
    @if(session()->has('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif
</div> 
<h2><a href="{{ route('user.blogshow') }}">SHOW BLOG</a></h2>

<h3>
    <a href="{{ route('user.password') }}">Change password</a>
</h3>
<h3>
    <a href="{{ route('user.details') }}">Change details</a>
</h3>
<div>
    <form method="post" action="{{ route('user.logout') }}">
        @csrf 
        <button type="submit">Log out</button>
</form>
</div>