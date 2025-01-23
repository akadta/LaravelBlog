<h1> WELCOME ADMIN {{Auth::user()->name}}</h1>
<div>
    @if(session()->has('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif
</div> 
<h2><a href="{{ route('admin.manage') }}">MANAGE COMMENTS</a></h2>
<div>
<h2>
    <a href="{{ route('admin.blog') }}">BLOG SECTION</a>
</h2>
</div><br><br>
<h3>
    <a href="{{ route('admin.password') }}">Change password</a>
</h3>
<h3>
    <a href="{{ route('admin.details') }}">Change details</a>
</h3>
<div>
    <form method="post" action="{{ route('admin.logout') }}">
        @csrf 
        <button type="submit">Log out</button>
</form>
</div>