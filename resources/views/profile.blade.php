@extends('layouts.app')

@section('content')

<div class="top-right">
    <a href="/profile/{{Auth::user()->id}}"><img src="https://static.thenounproject.com/png/771237-200.png" style="width: 70px; margin-top: -10px; margin-right: -20px;"></a>
</div>

<div class="container" style="background-color: #fafafa; width: 935px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row justify-content-center">
            <div style="width: 100%; height:150px; border: none;">
                <div class="row no-gutters" style="height:150px;">
                  <div>
                    <img src="{{ $user->profile->profileImage() }}" class="card-img" name="image" style="border-radius: 50%; width: 160px; height:160px; margin-left: 90px;">
                  </div>
                    <div style="margin-left: 90px;">
                    <p class="card-title" style="font-size: 20px; align-items: baseline; display: flex;">


                     <div>
                        <span>{{ $user->profile->title }}</span>

                        @can('update', $user->profile)
                        <span style="margin-left: 70px;">
                          <a href="/profile/{{ $user->id }}/edit">
                              <img src="{{asset('/images/edit.png')}}" style="width: 100px;">
                           </a> &nbsp;
                           <a class="uk-button" href="#modal-center" uk-toggle style="margin-left: -25px;">
                             <img src="{{asset('/images/cog.png')}}" style="width: 30px;"></i></a>
                        </span>
                     </div>

                        <div id="modal-center" class="uk-flex-top" uk-modal>
                            <div id="ukmodal" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" style="padding: 0px; width: 450px;">

                                <ul class="list-group" id="modallist" style="margin-right: -30px;">
                                    <li class="list-group-item">Change password</li>
                                    <li class="list-group-item">Nametag</li>
                                    <li class="list-group-item">Apps and Websites</li>
                                    <li class="list-group-item">Notifications</li>
                                    <li class="list-group-item">Privacy and Security</li>
                                    <li class="list-group-item">Login Activity</li>
                                    <li class="list-group-item">Emails from Instagram</li>
                                    <li class="list-group-item">Report a problem</li>
                                    <li class="list-group-item">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" style="color: red; font-weight: bold;">
                                            {{ __('Logout') }}
                                         </a>

                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>
                                    </li>
                                    <li class="list-group-item">Cancel</li>
                                </ul>
                            </div>
                        </div>
                      @endcan



                        @if ( (Auth::user()->id) === ($user->id))

                        @else
                        <button class="uk-button uk-button-primary uk-button-small action-follow" data-id="{{ $user->id }}" style="margin-left: 70px;"><strong>
                        @if(auth()->user()->isFollowing($user))
                            UnFollow
                        @else
                            Follow
                        @endif
                        </strong></button>
                        @endif



                    </p>
                        <p><strong>{{ $user->posts->count() }}</strong><b> posts</b> &nbsp; &nbsp;
                            <strong>{{ $user->followers()->get()->count() }}</strong> <a href="{{ route('user.view',auth()->user()->id)}}" style="color: black; text-decoration: none;"><b>followers</b></a>  &nbsp; &nbsp;
                            <strong>{{ $user->followings()->get()->count() }}</strong> <a href="{{ route('user.view',auth()->user()->id)}}" style="color: black; text-decoration: none;"><b>following</b></a>  &nbsp; &nbsp;
                        {{-- <a href="#modal-sections" class="float" uk-toggle><i class="fa fa-plus my-float">Add Post</i></a>
                          <div id="modal-sections" uk-modal>
                              <div class="uk-modal-dialog">
                                  <button class="uk-modal-close-default" type="button" uk-close></button>
                                  <div class="uk-modal-header">
                                      <h2 class="uk-modal-title" style="text-align: center;">Add Post</h2>
                                  </div>
                                  <div class="uk-modal-body">
                                    <div class="text-center">
                                        <div class="image-upload">
                                          <label for="file-input">
                                            <img src="https://cdn.pixabay.com/photo/2013/07/13/12/07/avatar-159236_960_720.png" class="rounded" style="width:170px;">
                                          </label>

                                          <input id="file-input" type="file" style="display: none;">
                                        </div>
                                      <br><br>
                                        <div class="input-group"  style="width: 540px;">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Write a Caption...</span>
                                          </div>
                                          <textarea class="form-control" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="uk-modal-footer uk-text-right">
                                      <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                      <button class="uk-button uk-button-primary" type="button">Save</button>
                                  </div>
                              </div>
                          </div> --}}
                      </p>
                      <p class="card-text" style="width: 270px;"><strong>{{ $user->name }}</strong>

                    @can('update', $user->profile)
                      <a href="/post/create">
                        <span class="uk-label uk-label-success" style="float: right;">Add Post</span>
                      </a>
                    @endcan
                      </p>
                      <p>{{ $user->profile->description }}</p>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>

    <div class="row" style="width: 100%;">
      <div class="col-lg-12">
          <br>
          <hr>
          <div class="btn-group" style="width: 100%; height: 30px; justify-content: center;">
            <button style="width: 100px;; background-color:#fafafa !important; border: none;"><i class="fas fa-th"></i> Posts</button>
            <button style="width: 100px;; background-color:#fafafa !important; border: none;"><i class="fas fa-tablet-alt"></i> IGTV</button>
            <button style="width: 100px;; background-color:#fafafa !important; border: none;"><i class="far fa-bookmark"></i> Saved</button>
            <button style="width: 100px;; background-color:#fafafa !important; border: none;"><i class="fas fa-id-badge"></i> Tagged</button>
          </div>
      </div>
    </div>
    <div class="row" style="margin-top: 20px; width: 100%;">

      @foreach ($user->posts as $post)
      <div class="col-lg-4">
      <a href="/post/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="img-responsive" style="width: 293px !important; height: 293px !important; padding-bottom: 20px;"></a>
      </div>
      @endforeach

    </div>


  {{-- <div class="row">
    <div class="col-lg-12">

        <ul uk-tab style="width: 52%; margin-left: 230px;">
            <li><a href="#"><i class="fas fa-th"></i> Posts</a></li>
            <li><a href="#"><i class="fas fa-tablet-alt"></i> IGTV</a></li>
            <li><a href="#"><i class="far fa-bookmark"></i> Saved</a></li>
            <li><a href="#"><i class="fas fa-id-badge"></i> Tagged</a></li>
        </ul>
        <ul class="uk-switcher">
          <li class="uk-text-center" class="uk-column-1-3" class="uk-flex-first" style="">
            <img src="https://i.redd.it/5u3thqiki2321.jpg" class="img-responsive" id="imgpost" style="width: 293px !important; height: 293px !important; padding-bottom: 10px;">
            <img src="https://i.redd.it/5u3thqiki2321.jpg" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px !important; padding-bottom: 10px;">
            <img src="https://isdb.pw/upload3/45271867/1946822088629059130.jpg" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px !important; padding-bottom: 10px;">
            <img src="https://isdb.pw/upload2/45271867/1863122933153672631.jpg" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px !important; padding-bottom: 10px;">
            <img src="https://i.pinimg.com/736x/e4/d4/da/e4d4da5776c35eba5475531e527501ca.jpg" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px; padding-bottom: 10px;">
            <img src="https://i.pinimg.com/736x/e4/d4/da/e4d4da5776c35eba5475531e527501ca.jpg" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px; padding-bottom: 10px;">
            <img src="https://qph.fs.quoracdn.net/main-qimg-45f370757fd92906419433b09378415c" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px; padding-bottom: 10px;">
            <img src="https://qph.fs.quoracdn.net/main-qimg-45f370757fd92906419433b09378415c" class="img-responsive"id="imgpost" style="width: 293px !important; height: 293px; padding-bottom: 10px;">
          </li>
          <li style=""><br>
            <img src="https://cdn0.iconfinder.com/data/icons/social-media-2222/64/IGTV-512.png" style="border-radius:50%; width:100px; height:100px;">
            <h2>Upload a Video</h2>
            <p style="font-size: 17px;">Videos must be between 1 and 60 minutes long.</p>
            <button type="button" class="btn btn-primary btn-sm" style="width:90px;">Upload</button>
          </li>
          <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
          <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
      </ul>
        </ul>
      </div>
    </div> --}}














</div>

@endsection
