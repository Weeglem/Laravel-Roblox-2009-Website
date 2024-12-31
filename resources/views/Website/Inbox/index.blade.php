@extends('Website.Templates.PageView')

@section('Content')
<form method="POST" action="{{route("Inbox_Page_DeleteMessages_post")}}">
    <div id="InboxContainer">
    <div id="InboxPane">
        <h2>Inbox</h2>
        @if($MessagesData->total() > 0)
        <div id="Inbox">
            <table cellspacing="0" cellpadding="3" border="0" id="ctl00_cphRoblox_InboxGridView" style="width:726px;border-collapse:collapse;">
                <tbody>
                    <tr class="InboxHeader">
                        <th align="left" scope="col">
                            <input id="ctl00_cphRoblox_InboxGridView_ctl01_SelectAllCheckBox" type="checkbox" name="ctl00$cphRoblox$InboxGridView$ctl01$SelectAllCheckBox" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphRoblox$InboxGridView$ctl01$SelectAllCheckBox\',\'\')', 0)">
                        </th>
                        <th align="left" scope="col">
                            <a href="{{route("InboxPage",["sort" => "Subject"])}}">Subject</a>
                        </th>

                        <th align="left" scope="col">
                            <a href="{{route("InboxPage",["sort" => "From"])}}">From</a></th>
                                <th align="left" scope="col"><a href="{{route("InboxPage",["sort" => "Date"])}}">Date
                            </a>
                        </th>
                    </tr>

                    @foreach($MessagesData as $Message)
                        @php($NotSeenColor = $Message->seen == 0 ? "color:red;" : null)
                        <tr class="InboxRow">
                            <td>
                                <span style="display:inline-block;width:25px;">
                                    <input id="DeleteCheckbox" type="checkbox" name="DeleteCheckbox[]" value="{{$Message->id}}">
                                </span>
                            </td>
                            <td align="left">
                                <a href="PrivateMessage.aspx?MessageID={{$Message->id}}" style="display:inline-block;width:325px;{{$NotSeenColor}}">{{$Message->subject}}</a>
                            </td>
                            <td align="left">
                                <a id="ctl00_cphRoblox_InboxGridView_ctl02_hlAuthor" title="{{$Message->from->username}}'s Home Page" href="{{route("ProfilePage",["ID" => $Message->from->id])}}" style="display:inline-block;width:175px;{{$NotSeenColor}}">
                                    {{$Message->from->username}}
                                </a>
                            </td>
                            <td align="left" style="{{$NotSeenColor}}">{{$Message->created_at}}</td>
                        </tr>
                    @endforeach

                    <tr class="InboxPager">
                        <td colspan="4">
                            <table border="0">
                                <tbody>
                                    <tr>
                                        @foreach($MessagesData->getUrlRange(1, $MessagesData->lastPage()) as $Paginator => $key)
                                            @if($Paginator == $MessagesData->currentPage())
                                                <td><span>{{$Paginator}}</span></td>
                                            @else
                                                <td><a href="{{$key}}">{{$Paginator}}</a></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                </tbody>
            </table>
       <div>

    </div>
    </div>
        @else
            <div id="Inbox" style="padding:5px">You have no messages in your inbox.</div>
        @endif

        <div class="Buttons">
            @if($MessagesData->total() > 0)

            @if((Session('error')))
                <p style="color:red">{{session('error')}}</p>
            @endif

            <button id="ctl00_cphRoblox_DeleteButton" class="Button" type="submit">Delete</button>
            @endif
            <a id="ctl00_cphRoblox_CancelHyperLink" class="Button" href="{{route("ProfilePage")}}">Cancel</a>
        </div>

    </div>
</div>
    @csrf
    @method("post")
</form>
<div style="clear: both"></div>
@endsection
