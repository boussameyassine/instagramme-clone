@extends('layouts.app')
@section('content')

<div class="container">

    <div class="top-right">
        <a href="/profile/{{Auth::user()->id}}"><img src="https://static.thenounproject.com/png/771237-200.png" style="width: 70px; margin-top: -10px; margin-right: -20px;"></a>
    </div>

    <div class="row">
        <div class="col-lg-7">

        <!-- begin timeline-body -->
        <div class="timeline-body">
            <div class="timeline-content">
                <img src="/storage/{{ $post->image }}" alt="" class="img-responsive mb20" style="width: 600px; height: 550px;">
            </div>
            <div class="timeline-likes">
               <div class="stats-right">
                  <span class="stats-text">259 Shares</span>
                  <span class="stats-text">21 Comments</span>
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
            <div class="timeline-comment-box" style="width: 100%; margin-left: 0px;">
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
                         <a href=""><button class="btn btn-primary f-s-12 rounded-corner" type="submit">Comment</button></a>
                         </span>
                     </div>
                 </form>

               </div>
            </div>
         </div>
        </div>

        <div class="col-lg-5">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}" class="card-img" style="border-radius: 50%; width: 50px; height:50px;">
                    </a>
                </div>
                <div>
                <a href="/profile/{{ $post->user->id }}"><h5><strong>{{ $post->user->username }}</strong></h5></a>
                </div>
            </div>
            <p>{{ $post->caption }}</p>

            <div class="scroller">
                @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>

        </div>
    </div>
</div>




@endsection




