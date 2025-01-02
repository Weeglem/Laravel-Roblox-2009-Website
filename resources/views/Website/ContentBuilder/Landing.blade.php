@extends('Website.Templates.PageView')

@section('Content')
<div id="ContentBuilderContainer">
    <div class="StandardBoxHeader" style="margin-top: 10px;">
        <h2>{{$assetType}} Builder</h2>
    </div>

    <div class="StandardBox">
        <div class="InstructionsPanel">
            <h3>Instructions</h3>
            @yield("Instructions")
        </div>

        <div id="ctl00_cphRoblox_UploaderPanel" class="UploaderPanel">
            @if($MembershipAccess)
                <h3>Upload Texture</h3>
                <blockquote>
                    <form action="{{$postRoute}}" method="post" enctype="multipart/form-data">
                        <p><input type="file" name="TextureFile" id="TextureFile" accept=".png,.jpg,.jpeg,.gif"></p>
                        <p><input type="submit" name="SubmitForm" value="Create {{$assetType}}" id="SubmitForm"></p>
                        @csrf
                        @method("post")
                    </form>
                </blockquote>
                <span class="DisclaimerLink">@yield("Disclaimer")</span>
                <p></p>

            @else
                <h3>Premium Feature</h3>
                <blockquote>
                    <p>Creating {{$assetType}} is a feature reserved for Builders Club Members. Why not <a href="#">join today?</a></p>
                </blockquote>
            @endif
            {{--Finish Invalid--}}

        </div>
    </div>
</div>
@endsection
