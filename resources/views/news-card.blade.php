<h2>{{ $news->title}}</h2>

<p>{{ $news->text}}</p>


<img src="/images/images.jpg" alt="">

<div class="comments">
    @foreach($comments as $comment)
        <div>
            <span>{{ $comment->user->name }}</span>
            <p>{{$comment->text}}</p>
        </div>
    @endforeach   
</div>