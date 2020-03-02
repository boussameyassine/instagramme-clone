{{-- @if($users->count())
@foreach($users as $user)
    <div class="col-3 profile-box border p-1 text-center bg-light mr-3 mt-3">
        <a href="/profile/{{ $user->id }}"><img src="{{ $user->profile->profileImage() }}" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive"></a>
        <h5 class="m-0"><a href="/profile/{{ $user->id }}"><strong>{{ $user->name }}</strong></a></h5>
        <p class="mb-2">
            <small><b>Following:</b> <span class="uk-badge">{{ $user->followings()->get()->count() }}</span></small>
            <small><b>Followers:</b> <span class="uk-badge">{{ $user->followers()->get()->count() }}</span></small>
        </p>
        <button class="uk-button uk-button-primary uk-button-small action-follow" data-id="{{ $user->id }}"><strong>
        @if(auth()->user()->isFollowing($user))
            UnFollow
        @else
            Follow
        @endif
        </strong></button>
    </div>
@endforeach
@endif --}}


@if($users->count())
@foreach($users as $user)
<div class="card" style="width: 470px; height: 70px; margin-right: 40px; margin-bottom: 15px;">
    <div class="card-body" style="display: flex; margin-left: -18px; flex-direction: row; justify-content: space-between;">
        <div style="display: contents;">
            <div>
                <a href="/profile/{{ $user->id }}"><img src="{{ $user->profile->profileImage() }}" style="height: 50px; width: 50px; border-radius: 50%; margin-top: -10px;" class="img-responsive"></a>
            </div>
            <div>
                <h5 class="m-0"><a href="/profile/{{ $user->id }}"><strong>{{ $user->name }}</strong></a></h5>
            </div>
        </div>
        <div style="display: inline-table;">
            <small><b>Following:</b> <span class="uk-badge">{{ $user->followings()->get()->count() }}</span></small>
            <small><b>Followers:</b> <span class="uk-badge">{{ $user->followers()->get()->count() }}</span></small>
        </div>
        <div style="float: right;">
            <button class="uk-button uk-button-primary uk-button-small action-follow" data-id="{{ $user->id }}"><strong>
                @if(auth()->user()->isFollowing($user))
                    UnFollow
                @else
                    Follow
                @endif
            </strong></button>
        </div>
    </div>
</div>
@endforeach
@endif


