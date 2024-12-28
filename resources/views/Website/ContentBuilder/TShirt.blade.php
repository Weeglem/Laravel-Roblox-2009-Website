@extends("Website.ContentBuilder.FormBase")

@php 
    $AssetType = "T-Shirt";
    $ApiLink = "a";
@endphp

@section("Instructions")

<p>On ROBLOX, a T-Shirt is a transparent torso adorsement with a decal applied to the front surface. To create a T-Shirt:</p>

<ol>
    <li>Click the "Browse" button below.</li>
    <li>Use the File Explorer that pops up to browse your computer.</li>
    
    <li>Find and celect the picture that you want to use as the shirt's decal. Any standard image <span style="font: normal 8pt/normal Verdana,sans-serif;">(.png, jpg, .gif)</span> will work. </li>
    <li>Finally, click the "Create T-Shirt" button.</li>
</ol>

<p>The image you selected will be uploaded to ROBLOX, where we will create a T-Shirt and add it to your inventory. To wear this T-shirt, simply go to the <a href="#">Change Character</a> page, find it in your wardrobe, and click to wear it.</p>

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