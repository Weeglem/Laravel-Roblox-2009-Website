@extends('Website.Templates.PageView')

@section('Content')
<div id="ctl00_cphRoblox_Panel1">
    <form id="BrowseContainer" style="text-align:center">
        <input name="Search" type="text" maxlength="100" value="{{ Request::get('Search') }}" id="ctl00_cphRoblox_tbSearch">&nbsp;
        <button type="submit" id="ctl00_cphRoblox_lbSearch">Search</button>
        <br><br>
    <form>

    @if(count($Users) > 0)

    <table class="Grid" cellspacing="0" cellpadding="4" border="0" id="ctl00_cphRoblox_gvUsersBrowsed">
        <tbody>
            <tr class="GridHeader">
                <th scope="col">Avatar</th><th scope="col">
                    <a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Sort$userName')">Name</a>
                </th>
                <th scope="col">Status</th>
                <th scope="col">
                    <a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Sort$lastActivity')">Location / Last Seen</a>
                </th>
            </tr>

            @foreach ($Users as $User)

            <tr class="GridItem">
                <td>
                    <a id="ctl00_cphRoblox_gvUsersBrowsed_ctl04_hlAvatar" title="Grimm114" href="{{route("Users_Profile_Page",["id" => $User->id])}}" style="display:inline-block;cursor:pointer;">
                        <img src="https://web.archive.org/web/20080901065547im_/http://t5.roblox.com:80/08aea0bc9f6f021a169cfcb853a2791c" border="0" alt="Grimm114"></a>
                </td>
                <td>
                    <a id="ctl00_cphRoblox_gvUsersBrowsed_ctl04_hlName" href="{{route("Users_Profile_Page",["ID" => $User->id])}}">{{$User->username}}</a><br>
                    <span id="ctl00_cphRoblox_gvUsersBrowsed_ctl04_lBlurb">{{$User->about}}</span>
                </td>
                <td>
                    <span id="ctl00_cphRoblox_gvUsersBrowsed_ctl04_lblUserOnlineStatus">Offline</span><br>
                </td>
                <td>
                    <span id="ctl00_cphRoblox_gvUsersBrowsed_ctl04_lblUserLocationOrLastSeen">Unknown</span>
                </td>
            </tr>

            @endforeach




            <tr class="GridPager">
                <td colspan="4"><table border="0">
                    <tbody><tr>
                        <td><span>1</span></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$2')">2</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$3')">3</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$4')">4</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$5')">5</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$6')">6</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$7')">7</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$8')">8</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$9')">9</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$10')">10</a></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Page$11')">...</a></td>
                    </tr>
                </tbody></table></td>
            </tr>
        </tbody>
    </table>

    @else

    <p>No results found</p>

    @endif
</div>
</div>
@endsection
