@extends('layouts.help')

@section('content')
    <div id="main">
        <div id="toptoolbar">
            <a class="nav-opener" href="#"><span></span></a>
            <div class="innerwrapper">


                <ul id="toptoolbarlinklist">


                    <li><a class="toptoolbarlink"
                           href="{{ route('help.list') }}" title="تذاكري">تذاكري</a>
                    </li>


                    <li><a class="toptoolbarlink"
                           href="{{ route('help.submit') }}" title="فتح تذكرة">فتح
                            تذكرة</a></li>


                    <li><a class="toptoolbarlink"
                           href="{{ route('logout') }}" title="تسجيل خروج">تسجيل
                            خروج</a></li>

                </ul>
            </div>
        </div>

        <div id="maincore">
            <div class="innerwrapper">


                <div id="maincorecontent">


                    <div class="boxcontainer">
                        <div class="boxcontainerlabel">مشاهدة التذكرة: #{{ $t->id }}</div>

                        <div class="boxcontainercontenttight">

                            <div class="ticketgeneralcontainer">
                                <div class="ticketgeneraltitlecontainer">
                                    <div class="ticketgeneraltitle">
                                        {{ $t->title }}
                                    </div>
                                </div>
                                <div class="ticketgeneralinfocontainer">أنشئت:
                                    {{ $t->created_at->diffForHumans() }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;آخر
                                    تحديث:
                                    {{ $lastUpdate }}
                                </div>


                                <tr>
                                    <td style="background-color: #36a148;">
                                        <div class="ticketgeneralcontainer">
                                            <div style="background-color: #36a148;" class="ticketgeneralproperties">

{{--                                                <div class="ticketgeneralpropertiesobject">--}}
{{--                                                    <div class="ticketgeneralpropertiestitle">القسم</div>--}}
{{--                                                    <div class="ticketgeneralpropertiescontent">مشتري الخدمات</div>--}}
{{--                                                </div>--}}

                                                <div class="ticketgeneralpropertiesdivider">  </div>

                                                <div class="ticketgeneralpropertiesobject">
                                                    <div class="ticketgeneralpropertiestitle">الحالة</div>

                                                    <div class="ticketgeneralpropertiescontent">{{ ($t->status)? "محلولة" : "مفتوحة" }}</div>

                                                </div>



                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody></table>

                                <br>

                                <div id="saveticketpropertiesbuttoncontainer">
                                    <div id="saveticketpropertiesbutton" class="rebuttonwide2 rebuttonwide2final"
                                         onclick="javascript: $('#ticketpropertiesform').submit();">حفظ التغييرات
                                    </div>
                                </div>

                                <div class="viewticketcontentcontainer">

                                    <table class="hlineheader">
                                        <tbody>
                                        <tr>
                                            <th rowspan="2" nowrap="">معلومات الطلب</th>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="hlinelower">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellspacing="1" cellpadding="4">


                                        <tbody>
                                        <tr>
                                            <td width="200" align="left" valign="middle" class="zebraodd">رقم الطلب:
                                            </td>
                                            <td>{{ $t->id }}
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                    <br>

                                </div>
                                </form>

                                <br>

                                <div id="addreplybutton">
                                    <div class="headerbutton"
                                         onclick="javascript: $('#postreplycontainer').show(); $('#addreplybutton').hide(); $('#replycontents').focus();">
                                        إضافه رد
                                    </div>
                                </div>

                                <div id="postreplycontainer" style="display: none;">
                                    <form method="post" action="{{ route('help.update',$t->id) }}"
                                          name="TicketReplyForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="ticketpaddingcontainer">
                                            <table class="hlineheader">
                                                <tbody>
                                                <tr>
                                                    <th rowspan="2" nowrap="">رسالتك</th>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="hlinelower">&nbsp;</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%" border="0" cellspacing="1" cellpadding="4">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2" align="left" valign="top"><textarea
                                                                name="replycontents" cols="25" rows="15"
                                                                id="replycontents" class="swifttextareawide"></textarea>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <br>


                                            <table class="hlineheader">
                                                <tbody>
                                                <tr>
                                                    <th rowspan="2" nowrap="">ارفاق ملفات [
                                                        <label for="file" class="addplus"><a class="btn btn-link" style="color: blue;" >إضافة
                                                                ملف</a></label>
                                                        ]
                                                    </th>
                                                    <td>
                                                        <input name="file" id="file" type="file" hidden>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="hlinelower">&nbsp;</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div id="ticketattachmentcontainer">
                                            </div>

                                            <br>

                                            <div class="subcontent"><input class="rebuttonwide2 rebuttonwide2final"
                                                                           value="إرسال" type="submit" name="button">
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="ticketpostsholder">
{{--                                    {{ dd($answers) }}--}}


                                    @foreach($answers as  $key=>$answer)

                                        <div class="ticketpostcontainer">
                                            <div class="ticketpostbar">
                                                <div class="ticketpostbarname">{{ $t->get_user->name }}</div>

                                                <div class="ticketpostbarbadgered">
{{--                                                    <div class="tpbadgetext">الدعم الفني</div>--}}
                                                </div>


                                            </div>

                                            <div class="ticketpostcontents">

                                                <div class="ticketpostcontentsbar">
{{--                                                    <a--}}
{{--                                                            onclick="javascript: QuoteTicketPost('6515', '13594'); self.scrollTo(0, 0); return false;"--}}
{{--                                                            class="ticketbarquote">&nbsp;&nbsp;&nbsp;</a>--}}
                                                    <div class="ticketbarcontents">نُشر : {{ $answer->created_at->diffForHumans() }}</div>
                                                    <span class="ticketbardatefold"></span></div>

                                                <div class="ticketpostcontentsdetails">
                                                    <div class="ticketpostcontentsholder">
                                                        <div class="ticketpostcontentsdetailscontainer">{{ $answer->content }}</div>
                                                    </div>

                                                    @if($answer->files != null)
                                                    <div class="ticketpostcontentsattachments">

                                                        <a download="{{ substr(strrchr( $answer->files, '-'), 1) }}" href="{{ asset('uploads/help/'.$answer->files) }}" class="ticketpostcontentsattachmentitem"
                                                             style="background-image: URL('https://help.hsoub.com/__swift/themes/client/images/mimeico_compressed.gif');">
                                                            &nbsp; {{ substr(strrchr( $answer->files, '-'), 1) }} </a>

                                                    </div>
                                                    @endif
                                                </div>

                                                <!--<div class="ticketpostcontentsbottom"><span class="ticketpostbottomright">&nbsp;</span><div class="ticketpostbottomcontents">&nbsp;</div></div>-->
                                            </div>

                                            <!--<div class="ticketpostbarbottom"><div class="ticketpostbottomcontents">&nbsp;&nbsp;</div></div>-->

                                            <div class="ticketpostclearer"></div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
                <div class="innerwrapper">
                    <div id="bottomfooter" class="bottomfooterpadding"></div>
                </div>
            </div>
        </div>

@endsection