@extends('layouts.app')

@section('content')


<div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="/profile/{{Auth::user()->id}}"><img src="https://static.thenounproject.com/png/771237-200.png" style="width: 50px; margin-top: -10px; margin-right: -20px;"></a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>


<div class="container">
    <div class="row">

     @foreach ($posts as $post)

        <div class="col-lg-10" style="margin-left: -40px;">
            <div id="content">

                <!-- begin profile-content -->
                <div class="profile-content">
                    <!-- begin tab-content -->
                    <div class="tab-content p-0">
                    <!-- begin #profile-post tab -->
                    <div class="tab-pane fade active show" id="profile-post">
                        <!-- begin timeline -->
                        <ul class="timeline">
                            <li>
                                <!-- begin timeline-time -->
                                <div class="timeline-time">
                                <span class="date">{{ $post->created_at->format('jS F Y') }}</span>
                                <span class="time">{{ $post->created_at->format('H:i') }}</span>
                                </div>
                                <!-- end timeline-time -->
                                <!-- begin timeline-icon -->
                                <div class="timeline-icon">
                                <a href="javascript:;">&nbsp;</a>
                                </div>
                                <!-- end timeline-icon -->
                                <!-- begin timeline-body -->
                                <div class="timeline-body">
                                <div class="timeline-header">
                                    <span class="userimage"><a href="/profile/{{ $post->user->id }}"><img src="{{ $post->user->profile->profileImage() }}" alt=""></a></span>
                                    <span class="username"><a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a> <small></small></span>
                                    <span class="pull-right text-muted">18 Views</span>
                                </div>
                                <div class="timeline-content">
                                    <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" alt="" class="img-responsive mb20" style="width: 600px; height: 550px;"></a>
                                </div>
                                <div class="timeline-likes">
                                    <div class="stats-right">
                                        {{-- <span class="stats-text">259 Shares</span> --}}
                                        <a href="/post/{{ $post->id }}">
                                            <span class="stats-text">{{ $post->comments()->get()->count() }} comments</span>
                                        </a>
                                    </div>
                                    <div class="stats">
                                        <span class="fa-stack fa-fw stats-icon">
                                        <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                        <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                        </span>
                                        <span class="fa-stack fa-fw stats-icon">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <span class="stats-total">4.3k</span>
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                                    <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                                </div>
                                <div class="timeline-comment-box">
                                    <div class="user">
                                        <a href="/profile/{{Auth::user()->id}}"><img src="{{ Auth::user()->profile->profileImage() }}"></a>
                                        </div>
                                    <div class="input">
                                        <form method="post" action="{{ route('comments.store'   ) }}">
                                                @csrf
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-corner" name="body" placeholder="Write a comment...">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                <span class="input-group-btn p-l-10">
                                                <a href="/post/{{ $post->id }}"><button class="btn btn-primary f-s-12 rounded-corner" type="submit">Comment</button></a>
                                                </span>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                </div>
                                <!-- end timeline-body -->
                            </li>
                        </ul>
                        <!-- end timeline -->
                    </div>
                    <!-- end #profile-post tab -->
                    </div>
                    <!-- end tab-content -->
                </div>
                <!-- end profile-content -->
            </div>
        </div>

     @endforeach



    </div>
 </div>



@endsection


