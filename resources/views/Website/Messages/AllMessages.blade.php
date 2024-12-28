@extends('Website.Templates.PageView')

@section('Content')
<div id="InboxContainer">
    <div id="InboxPane">
        <h2>Inbox</h2>
        <div id="Inbox">
            
            <div>
<table cellspacing="0" cellpadding="3" border="0" id="ctl00_cphRoblox_InboxGridView" style="width:726px;border-collapse:collapse;">
    <tbody>
        <tr class="InboxHeader">
            <th align="left" scope="col">
                <input id="ctl00_cphRoblox_InboxGridView_ctl01_SelectAllCheckBox" type="checkbox" name="ctl00$cphRoblox$InboxGridView$ctl01$SelectAllCheckBox" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphRoblox$InboxGridView$ctl01$SelectAllCheckBox\',\'\')', 0)">
            </th>
            <th align="left" scope="col">
                <a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Sort$m.[Subject]')">Subject</a>
            </th>
            <th align="left" scope="col">
                <a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Sort$u.[userName]')">From</a></th><th align="left" scope="col"><a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Sort$m.[Created]')">Date</a>
            </th>
        </tr>

        <tr class="InboxRow">
        <td>
                            <span style="display:inline-block;width:25px;"><input id="ctl00_cphRoblox_InboxGridView_ctl02_DeleteCheckbox" type="checkbox" name="ctl00$cphRoblox$InboxGridView$ctl02$DeleteCheckbox"></span>
                        </td><td align="left"><a href="PrivateMessage.aspx?MessageID=2274781" style="display:inline-block;width:325px;">oooohhhhhh</a></td><td align="left">
                            <a id="ctl00_cphRoblox_InboxGridView_ctl02_hlAuthor" title="Visit yea's Home Page" href="../User.aspx?ID=85305" style="display:inline-block;width:175px;">yea</a>
                        </td><td align="left">1/2/2008 2:13:37 PM</td>
        </tr>
        <tr class="InboxPager">
        <td colspan="4"><table border="0">
            <tbody><tr>
                <td><span>1</span></td><td><a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Page$2')">2</a></td>
            </tr>
        </tbody></table></td>
    </tr>
</tbody></table>
</div>
        </div>
        <div class="Buttons">
            <a id="ctl00_cphRoblox_DeleteButton" class="Button" href="javascript:__doPostBack('ctl00$cphRoblox$DeleteButton','')">Delete</a>
            <a id="ctl00_cphRoblox_CancelHyperLink" class="Button" href="../User.aspx">Cancel</a>
        </div>
    </div>
</div>
@endsection