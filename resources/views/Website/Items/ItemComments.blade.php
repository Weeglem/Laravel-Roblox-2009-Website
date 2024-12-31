 <div class="ajax__tab_panel" id="CommentaryTab" style="display: none">
     <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsUpdatePanel">
         <div class="CommentsContainer">

             <h3>Comments ({{$ItemComments->total()}})</h3>

                @if($ItemComments->count() > 0)

                    <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerPanel" class="HeaderPager" style="padding:0;">
                        @if($ItemComments->currentPage() > 1)
                            <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Back" href="{{$ItemComments->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back </a>
                        @endif

                        @if($ItemComments->hasMorePages())
                            <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerLabel">Page {{$ItemComments->currentPage()}} of {{$ItemComments->lastPage()}}</span>
                        @endif

                        @if($ItemComments->hasMorePages())
                            <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Next" href="{{$ItemComments->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                        @endif
                    </div>

                    <div class="Comments">

                        @foreach($ItemComments as $Comment)
                            @if($loop->index % 2 == 0)
                                <div class="Comment">
                                    @else
                                        <div class="AlternateComment">
                                            @endif

                                            <div class="Commenter">
                                                <div class="Avatar">
                                                    <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_AvatarImage" title="alexwalker332" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?ID=293219" style="display:inline-block;cursor:pointer;">
                                                        <img src="{{asset("img/Placeholder/AvatarCommentInGame.png")}}" border="0" alt="alexwalker332" blankurl="http://t6.roblox.com:80/blank-64x64.gif">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="Post">
                                                <div class="Audit">Posted 12 minutes ago by
                                                    <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_UsernameHyperLink" href="{{$Comment->user->id}}">{{$Comment->user->username}}</a>
                                                </div>
                                                <!--Move to CSS-->
                                                <div class="Content" style="width: 560px;">{{$Comment->comment}}</div>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>
                                        @endforeach
                                </div>

                                <!--Comment paginate-->
                                <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPagerPanel" class="FooterPager">
                                    @if($ItemComments->currentPage() > 1)
                                        <!--Back page-->
                                        <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Back" href="{{$ItemComments->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back </a>
                                    @endif

                                    <!--Comment paginate-->
                                    @if($ItemComments->hasMorePages())
                                        <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerLabel">Page {{$ItemComments->currentPage()}} of {{$ItemComments->lastPage()}}</span>
                                   @endif

                                    @if($ItemComments->hasMorePages())
                                        <!--Next page-->
                                        <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Next" href="{{$ItemComments->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                                    @endif
                                </div>




                            @else

                                <p style="text-align: center;">There are no comments for this item.</p>

                            @endif

                            <div id="ctl00_cphRoblox_CommentsPane_CommentsUpdatePanel">

                                @if($ItemConfig->comments_allowed == 1)
                                    <form id="ctl00_cphRoblox_CommentsPane_PostAComment" class="PostAComment" method="post" action="{{route("Asset_Comment_post",["id"=> $ItemData->id])}}">
                                        <h3>Comment on this Game</h3>
                                        <div class="CommentText">
                                            <textarea name="message" rows="5" cols="20" id="ctl00_cphRoblox_CommentsPane_NewCommentTextBox" class="MultilineTextBox"></textarea></div>
                                        <div class="Buttons"><button class="Button" type="submit">Post Comment</button></div>
                                        @csrf
                                        @method("post")
                                    </form>

                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <p style="color:red;font-size: 12px">{{$error}}</p>
                                        @endforeach
                                    @endif

                                @endif
                            </div>
                    </div>
            </div>
        </div>
 </div>
