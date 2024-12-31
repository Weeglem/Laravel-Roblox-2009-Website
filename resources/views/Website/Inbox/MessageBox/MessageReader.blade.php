<form id="ctl00_cphRoblox_pPrivateMessageReader" action="{{route("Inbox_Page_DeleteMessages_post",["ID" => $MessageData->id])}}" method="post" >
    <h3>Private Message</h3>
    <div class="MessageReaderContainer">
        <div id="Message">
            <table width="100%">
                <tbody><tr valign="top">
                    <td style="width: 10em">
                        <div id="DateSent">{{$MessageData->created_at}}</div>
                        <div id="Author">

                            <a id="ctl00_cphRoblox_rbxMessageReader_Avatar" disabled="disabled" title="User" onclick="return false" style="display:inline-block;height:64px;width:64px;"><img src="http://t7.roblox.com:80/Avatar-64x64-4300edbc08eef1b9d709779ed6105409.Png" border="0" id="img" alt="User"></a><br>
                            <a id="ctl00_cphRoblox_rbxMessageReader_AuthorHyperLink" title="Visit User's Home Page" href="../User.aspx?ID=0">{{$MessageData->from->username}}</a>
                        </div>
                        <div id="Subject">
                            {{$MessageData->subject}}<br><br>
                            <div id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_AbuseReportPanel" class="ReportAbusePanel">
                                <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_ReportAbuseIconHyperLink" href="../AbuseReport/Message.aspx?ID=2140858&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fMy%2fPrivateMessage.aspx%3fMessageID%3d2140858"><img src="{{asset("/img/abuse.png")}}" alt="Report Abuse" style="border-width:0px;"></a></span>
                                <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_ReportAbuseTextHyperLink" href="../AbuseReport/Message.aspx?ID=2140858&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fMy%2fPrivateMessage.aspx%3fMessageID%3d2140858">Report Abuse</a></span>
                            </div>
                        </div>
                    </td>

                    <td style="padding: 0 10px 0 10px">
                        <div class="Body">
                            <div id="ctl00_cphRoblox_rbxMessageReader_pBody" class="MultilineTextBox" style="height:250px;overflow-y:scroll;">

                                {{$MessageData->message}}

                                @foreach($MessageData->replies() as $OldReply)
                                    <br>
                                    <br>------------------------------
                                    <br>On {{$OldReply->created_at}} {{$OldReply->from->username}} wrote:
                                    <br>
                                    <br>{{$OldReply->message}}
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="Buttons">
        <a id="ctl00_cphRoblox_lbCancel" class="Button" href="{{route("Inbox_Message",["ReplyID" => $MessageData->id])}}">Reply</a>
        <button id="ctl00_cphRoblox_lbDelete" name="action" class="Button" type="submit" value="delete">Delete</button>
        <a id="ctl00_cphRoblox_lbCancel" class="Button" href="{{route("InboxPage")}}">Cancel</a>
        @csrf
    </div>
    <div style="clear:both"></div>


</form>
