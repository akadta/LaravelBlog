<form method="post" action="{{ route('user.comupdate',$comment->id) }}">
            @csrf 
            @method('put')
            <p>Comment :<br><textarea name="comment">{{$comment->comment}}</textarea></p>
            <button type="submit">submit</button>
</form>