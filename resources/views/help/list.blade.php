@extends('layouts/help')
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


                    <!-- BEGIN DIALOG PROCESSING -->
                    <div class="boxcontainer">
                        <div class="boxcontainerlabel">
                            مشاهدة التذاكر
                        </div>

                        <div class="boxcontainercontent search-results">

                            <table border="0" cellpadding="3" cellspacing="1" width="100%">
                                <thead>
                                <tr>
                                    <td class="ticketlistheaderrow" align="left" valign="middle" width="150">رقم
                                        التذكرة
                                    </td>
                                    <td class="ticketlistheaderrow" align="center" valign="middle" width="200"><a
                                                href="javascript:void(0)">آخر
                                            تحديث&nbsp;</a></td>
                                    <td class="ticketlistheaderrow" align="center" valign="middle" width=""><a
                                                href="javascript:void(0)">آخر
                                            من رد&nbsp;</a></td>
                                    <td class="ticketlistheaderrow" align="center" valign="middle" width="180"><a
                                                href="javascript:void(0)">القسم&nbsp;</a>
                                    </td>
                                    <td class="ticketlistheaderrow" align="center" valign="middle" width="120"><a
                                                href="javascript:void(0)">الحالة&nbsp;</a>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($list as $t)
                                <tr>
                                    <td class="ticketlistsubject" align="left" valign="middle" colspan="7"><a
                                                href="{{ route('help.single',$t->id) }}">{{ $t->title }}</a></td>
                                </tr>
                                <tr class="ticketlistproperties" style="background: #36a148;">
                                    <td class="ticketlistpropertiescontainer" data-label="رقم التذكرة" align="left"
                                        valign="middle">{{ $t->id }}
                                    </td>
                                    <td class="ticketlistpropertiescontainer" data-label="آخر تحديث" align="center"
                                        valign="middle">{{ $t->lastUpdate() }}
                                    </td>
                                    <td class="ticketlistpropertiescontainer" data-label="آخر من رد" align="center"
                                        valign="middle">{{ $t->lastAnswer() }}
                                    </td>
                                    <td class="ticketlistpropertiescontainer" data-label="القسم" align="center"
                                        valign="middle">{{ $t->departmentName() }}
                                    </td>
                                    <td class="ticketlistpropertiescontainer" data-label="الحالة" align="center"
                                        valign="middle">{{ ($t->status)? "محلولة" : "مفتوحة" }}
                                    </td>
                                </tr>
                                <tr class="ticketlistpropertiesdivider">
                                    <td colspan="7">&nbsp;</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <div class="paginationcontainer">
                            <table border="0" cellpadding="3" cellspacing="1" class="paginationborder">
                                <tbody>
                                <tr>
                                    <td class="gridhighlightpage">{{ $list->links() }}</td>
                                    <td class="gridnavpage"><a href="javascript: void(0);"
                                                               onclick="javascript:Redirect(&quot;https://help.hsoub.com/Tickets/ViewList/Index/1/-1&quot;);"
                                                               title=""></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="innerwrapper">
                    <div id="bottomfooter" class="bottomfooterpadding"></div>
                </div>
            </div>
        </div>

@endsection