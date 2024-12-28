@extends("Website.ContentBuilder.FormBase")

@php 
    $AssetType = "Shirt";
    $ApiLink = "a";
@endphp

@section("Instructions")

<p>On ROBLOX, a Shirt is a textured character adornment that is applied to all surfaces of the character's arms and torso. To create a Shirt:</p>

<ol>
    <li>Open the <a href="#">Shirt Template</a> in the image editor of your choice.</li>
    <li>Modify the template to suit your tastes.</li>
    <li>Save the customized Shirt Texture to your computer.</li>
    <li>Click the "Browse" button below.</li>
    <li>Use the File Explorer that pops up to browse your computer.</li>
    <li>Find and select the newly created Shirt Texture.</li>
    <li>Finally, click the "Create Shirt" button.</li>
</ol>

<p>The texture you created will be uploaded to ROBLOX, where we will create a Shirt and add it to your inventory. To wear this Shirt, 
    simply go to the <a href="#">Change Character</a> page, find it in your wardrobe, and click to wear it.
    For more information, read the tutorial: <a href="#">How to Make Shirts and Pants.</a></p>
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