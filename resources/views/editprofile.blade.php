@extends('layouts.app')

@section('content')
<br><br>
<div class="container"  style="width: 950px; backround-color: white;">
    <div class="row" style="border: 1.5px solid #e6e6e6; background-color: white;">
        <div class="col-lg-12">
            <div class="uk-child-width-1-2@s" uk-grid>
                <div class="uk-width-auto@m" style="width: 280px;">
                    <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade" style="margin-top: 10px;">
                        <li style="height: 58px;"><a href="#">Edit Profile</a></li>
                        <li style="height: 58px;"><a href="#">Change Password</a></li>
                        <li style="height: 58px;"><a href="#">Apps and Websites</a></li>
                        <li style="height: 58px;"><a href="#">Email and SMS</a></li>
                        <li style="height: 58px;"><a href="#">Manage Contacts</a></li>
                        <li style="height: 58px;"><a href="#">Privacy and Security</a></li>
                        <li style="height: 58px;"><a href="#">Login Activity</a></li>
                        <li style="height: 58px;"><a href="#">Emails from instagram</a></li>

                    </ul>
                </div>
                <div class="uk-width-expand@m">
                    <ul id="component-tab-left" class="uk-switcher" style="margin-top: 10px;">
                        <li style=" height: 700px;">
                        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post" class="uk-form-horizontal uk-margin-large" style="margin-top: 40px;">
                            @csrf
                            @method('PATCH')

                            <div>
                                
                            <a href="/profile/{{ $user->id }}"><img src="{{ $user->profile->profileImage() }}" class="card-img" style="border-radius: 50%; width: 60px; height:60px;"></a>
                                <p class="card-title" style="font-size: 17px; margin-top: -56px; margin-left: 80px;">{{ Auth::user()->username }}<br>

                                    <a href="">
                                        <div class="image-upload">
                                            <label for="file-input" style="margin-left: 70px;">
                                                Change Profile Photo
                                            </label>
                                            <input id="file-input" name="image" type="file" style="display: none;">
                                        </div>
                                    </a>

                                </p>
                            </div>
                            <div style="margin-top: 10px;">

                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text" style="width: 100px; margin-left: 10px">Name</label>
                                            <div class="uk-margin">
                                                <input class="uk-input" type="text" name="name" value="{{ $user->name }}" style="width: 450px;">
                                            </div>

                                            @if ($errors->has('name'))
                                            <strong>{{ $errors->first('name') }}</strong>
                                            @endif

                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text" style="width: 100px; margin-left: 10px">Username</label>
                                            <div class="uk-margin">
                                                <input class="uk-input" type="text" name="username" value="{{ $user->username }}" style="width: 450px;">
                                            </div>

                                            @if ($errors->has('username'))
                                            <strong>{{ $errors->first('username') }}</strong>
                                            @endif

                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text" style="width: 100px; margin-left: 10px">Title</label>
                                            <div class="uk-margin">
                                                <input class="uk-input" type="text" name="title" value="{{ $user->profile->title }}" style="width: 450px;">
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text" style="width: 100px; margin-left: 10px;">Description</label>
                                            <div class="uk-margin">
                                                <textarea type="text" class="uk-textarea" rows="3" name="description" value="" style="width: 450px;">{{ $user->profile->description }}</textarea>
                                            </div>

                                            @if ($errors->has('description'))
                                            <strong>{{ $errors->first('description') }}</strong>
                                            @endif

                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text" style="width: 100px; margin-left: 10px">Email</label>
                                            <div class="uk-margin">
                                                <input class="uk-input" type="text" name="email" placeholder="{{ Auth::user()->email }}" style="width: 450px;">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-text" value="911" style="width: 100px; margin-left: 10px">Phone Number</label>
                                            <div class="uk-margin">
                                                <input class="uk-input" type="text" placeholder="" style="width: 450px;">
                                            </div>
                                        </div>


                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-horizontal-select" style="margin-left: 10px;">Gender</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select" id="form-horizontal-select">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="uk-button uk-button-primary" type="submit" onclick="return confirm('Confirm Changes');" style="margin-left: 240px; margin-bottom: -60px;">Save Profile</button>
                                    </form>
                            </div>
                        </li>
                        <li>
                            <div>
                                <img src="{{ $user->profile->profileImage() }}" class="card-img" alt="Avatar" style="border-radius: 50%; width: 60px; height:60px;"><p class="card-title" style="font-size: 17px; margin-top: -56px; margin-left: 80px;">{{ Auth::user()->username }}</p>
                            </div>
                            <form class="uk-form-horizontal uk-margin-large">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text" style="width: 150px;"><b>Old Password</b></label>
                                    <input class="uk-input" id="form-horizontal-text" type="text" placeholder="" style="width: 350px; margin-left: 30px;">
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text" style="width: 150px;"><b>New Password</b></label>
                                    <input class="uk-input" id="form-horizontal-text" type="text" placeholder="" style="width: 350px; margin-left: 30px;">
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-horizontal-text" style="width: 150px;"><b>New Password</b></label>
                                    <input class="uk-input" id="form-horizontal-text" type="text" placeholder="" style="width: 350px; margin-left: 30px;">
                                </div>
                                <button class="uk-button uk-button-primary" type="submit" style="margin-left: 180px; margin-bottom: -30px;">Change Password</button>
                                <a href="" style="margin-left: 420px;">Forgot Password?</a>
                            </form>
                        </li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li>
                            <br>
                        <h3>Emails From Instagram</h3>
                            <ul uk-tab>
                                <li style="width: 50%;"><a href="#">SECURITY</a></li>
                                <li style="width: 50%;"><a href="#">OTHER</a></li>
                            </ul>

                            <ul class="uk-switcher uk-margin">
                                <li>This is a list of emails Instagram has sent you about security and login in the last 14 days. You can use it to verify which emails are real and which are fake.<a href=""> Learn more.</a></li>
                                <li>This is a list of the emails Instagram has sent you in the last 14 days that aren't about security or login. You can use it to verify which emails are real and which are fake.<a href=""> Learn more.</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

