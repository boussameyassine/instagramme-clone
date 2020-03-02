@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    List of Users
                </div>

                <div class="card-body" style="width: 1110px;">
                    <div class="row pl-5">
                        @if ( $count > 0)
                        @foreach ($user as $user)
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
                            @else
                                No user found
                            @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

