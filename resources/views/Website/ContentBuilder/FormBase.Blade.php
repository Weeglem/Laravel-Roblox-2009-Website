@extends('Website.Templates.PageView')

@php
    $BuilderClub = true; //DEBUG TEST
@endphp

@section('Content')
<div id="ContentBuilderContainer">
    <div class="StandardBoxHeader" style="margin-top: 10px;">
        <h2>{{$AssetType}} Builder</h2>
    </div>

    <div class="StandardBox">
        <div class="InstructionsPanel">
            <h3>Instructions</h3>
            @yield("Instructions")
        </div>

        
        <div id="ctl00_cphRoblox_UploaderPanel" class="UploaderPanel">
            {{--Valid Builder Club--}}
            @if($BuilderClub == true)
                <h3>Upload Texture</h3>
                <blockquote>
                    <form action="{{$ApiLink}}" method="post" enctype="multipart/form-data">
                        <p><input type="file" name="TextureFile" id="TextureFile" accept=".png,.jpg,.jpeg,.gif"></p>
                        <p><input type="submit" name="SubmitForm" value="Create {{$AssetType}}" id="SubmitForm"></p>
                        @csrf
                        @method("post")
                    </form>
                </blockquote>
                <span class="DisclaimerLink">@yield("Disclaimer")</span>
                <p></p>
            {{--Finish Valid--}}


            {{--Invalid Builder Club--}}
            @else
                <h3>Premium Feature</h3>
                <blockquote>
                    <p>Creating {{$AssetType}} is a feature reserved for Builders Club Members. Why not <a href="#">join today?</a></p>
                </blockquote>
            @endif
            {{--Finish Invalid--}}

        </div>
    </div>
</div>
@endsection