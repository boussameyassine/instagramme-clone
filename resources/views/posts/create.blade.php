@extends('layouts.app')
 @section('content')

<div class="container">
    <form action="/post" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align: center;">Add new Post</h2> <br>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-lg-12">
                <div class="image-upload">
                    <label for="file-input">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTbmq9QFhSNgTEB3HhHseGIEcdTPDyNpEqu13szUzOxAL7Wh2HM" class="rounded" style="width:170px;">
                    </label>

                    <input id="file-input" name="image" type="file" style="display: none;">

                    @if ($errors->has('image'))
                    <strong>{{ $errors->first('image') }}</strong>
                    @endif

                </div>
                        <br><br>
                <div class="input-group"  style="width: 605px; margin-left: 240px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Write a Caption...</span>
                </div>
            <textarea class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus></textarea>

                    @if ($errors->has('caption'))
                     <strong>{{ $errors->first('cpation') }}</strong>
                    @endif

                </div>

                        <br><br>
                <div class="uk-modal-footer uk-text-right" style="width: 290px; margin-left: 416px;">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>

 @endsection
