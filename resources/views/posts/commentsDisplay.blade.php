@foreach($comments as $comment)

<div @if($comment->parent_id != null) style="margin-left:80px; background: #f2f3f4; border-top: 1px solid #D3D4D4;" @else style="border-top: 1px solid #BCBCBC;" @endif>

    <li class="media">
        <a href="/profile/{{ $post->user->id }}" class="pull-left">
            <img src="{{ $post->user->profile->profileImage() }}" alt="" class="img-circle">
        </a>
        <div class="media-body">
            <span class="text-muted pull-right">
                <small class="text-muted" style="margin-right: 10px;">{{ $comment->created_at->format('j F Y / H:i') }}</small>
            </span>
            <strong class="text-success">{{ $comment->user->name }}</strong>
            <p style="margin-top: 15px;">
                {{ $comment->body }}
            </p>
        </div>
    </li>

    @auth
    @if($comment->parent_id === null)
    <form method="post" action="{{ route('comments.store') }}">
        @csrf
        <div class="timeline-comment-box" style="width: 100%; margin-left: 0px;">
            <div class="user">
                <img src="{{ Auth::user()->profile->profileImage() }}">
            </div>
            <div class="input">
                <form method="post" action="{{ route('comments.store'   ) }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control rounded-corner" name="body" placeholder="Reply to {{ $comment->user->name }} ...">
                        <input type="hidden" name="post_id" value="{{ $post_id }}" />
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                        <span class="input-group-btn p-l-10">
                        <a href=""><button class="btn btn-primary f-s-12 rounded-corner" type="submit">Reply</button></a>
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </form>
    @endif
    @endauth
    @include('posts.commentsDisplay', ['comments' => $comment->replies])
</div>

@endforeach

