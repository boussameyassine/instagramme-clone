@extends('layouts.app')

@section('content')

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">

                <div class="card-body">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="nav-home" aria-selected="true">Followers <span class="badge badge-primary">{{ $user->followers()->get()->count() }}</span></a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#following" role="tab" aria-controls="nav-profile" aria-selected="false">Following <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row pl-5">
                            @include('userList', ['users'=>$user->followers()->get()])
                        </div>
                      </div>
                      <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row pl-5">
                            @include('userList', ['users'=>$user->followings()->get()])
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="top-right">
    <a href="/profile/{{Auth::user()->id}}">
        <img src="https://static.thenounproject.com/png/771237-200.png" style="width: 50px; margin-top: -10px; margin-right: -20px;">
    </a>
</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Followers</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Following</a>
					</div>
				</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
							@include('userList', ['users'=>$user->followers()->get()])
						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
							@include('userList', ['users'=>$user->followings()->get()])
						</div>
					</div>
			</div>
		</div>
	</div>


@endsection
