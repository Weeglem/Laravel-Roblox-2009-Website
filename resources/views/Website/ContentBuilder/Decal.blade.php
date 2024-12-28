@extends("Website.ContentBuilder.FormBase")

@php 
    $AssetType = "Decal";
    $ApiLink = "a";
@endphp

@section("Instructions")
<p>On Roblox, a Decal is an image that can be applied to one of a part's faces. To create a Decal:</p>
<ol>
    <li>Click the "Browse" button below.</li>
    <li>Use the File Explorer that pops up to browse your computer.</li>
    <li>Find and select the picture that you want to use as your decal. 
    Only <span style="font: normal 8pt/normal Verdana,sans-serif;">.png, .gif (one frame only), .jpeg (and it's many types)</span> are allowed.</li>
    <li>Also image must be less than 2mb in size.</li>
    <li>Finally, click the "Create Decal" button.</li>
</ol>
<p>
    The image you selected will be uploaded to Roblox, where we will create a Decal
    and add it to your inventory. To use this Decal, simply open the <strong>Insert</strong>
    menu in Roblox, choose My Decals, and click the Decal you wish to insert. You can
    drag the Decal onto the part you wish to decorate.
</p>
@endsection

@section("Disclaimer")
All uploaded images are moderated. Please upload only appropriate content. 
        <!--
        <a href="#" onclick="return false;">
            Image rules 
            <span>
                Roblox allows users to upload their own images for the purpose of decorating their character and places.
                All uploaded images are screened by human moderators. Inappropriate images are removed
                from Roblox. Users who upload inappropriate content may be warned or banned (depending
                on level of offense). All images must be suitable for viewing by kids aged 4-124.
                <br><br>
                
                Guidelines
                <ul>
                    <li>No photos of real (regular) people including users, kids, parents, etc </li>
                    <li>No imagery that would not appear in a G-rated movie</li>
                    <li>No images with subversive intent</li>
                    <li>No images with offensive text</li>
                    <li>No images with drugs or drug related items</li>
                    <li>No nudity or suggestive images</li>
                    <li>No gory or bloody things</li>
                    <li>No real guns/swords/other weapons</li>
                </ul>
            </span>
        </a>
    -->
@endsection