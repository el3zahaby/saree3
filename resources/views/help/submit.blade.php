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

                    <form class="submitticketform" method="post"
                          action="{{ route('help.submit.post') }}" name="SubmitTicketForm"
                          enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="boxcontainer">
                            <div class="boxcontainerlabel">تفاصيل التذكرة</div>

                            <div class="boxcontainercontent">
                                نرجو منك تزويدنا بكافة تفاصيل الطلب أو المشكلة التي تواجهها لنتمكن من حلها في أسرع وقت
                                ممكن.<br><br>

                                <div class="boxcontainercontent">

                                    <table class="hlineheader"><tbody><tr><th rowspan="2" nowrap="">اختر القسم:</th><td>&nbsp;</td></tr><tr><td class="hlinelower">&nbsp;</td></tr></tbody></table>
                                    <table width="100%" border="0" cellspacing="1" cellpadding="4">



                                        <tr class="ticketsubdepartments_4" style="">
                                            <td width="16" align="left" valign="middle" class="zebraodd">
                                                <input type="radio" name="departmentid" checked value="عميل" id="department_1"></td>
                                            <td><div class="ticketsubdepartment"><label for="department_1">عميل</label></div></td>
                                        </tr>

                                        <tr class="ticketsubdepartments_4" style="">
                                            <td width="16" align="left" valign="middle" class="zebraodd">
                                                <input type="radio" name="departmentid" value="مقدمي الخدمات / البائعين" id="department_2"></td>
                                            <td><div class="ticketsubdepartment"><label for="department_2">مقدمي الخدمات / البائعين</label></div></td>
                                        </tr>

                                        <tr class="ticketsubdepartments_4" style="">
                                            <td width="16" align="left" valign="middle" class="zebraodd">
                                                <input type="radio" name="departmentid" value="معرض - منتج" id="department_3"></td>
                                            <td><div class="ticketsubdepartment"><label for="department_3">معرض - منتج</label></div></td>
                                        </tr>

                                        <tr class="ticketsubdepartments_4" style="">
                                            <td width="16" align="left" valign="middle" class="zebraodd">
                                                <input type="radio" name="departmentid" value="الموقع" id="department_4"></td>
                                            <td><div class="ticketsubdepartment"><label for="department_4">الموقع</label></div></td>
                                        </tr>



                                        </tbody></table>
                                    <br>

                                </div>
                                <div class="form-table">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="4">


                                    </table>
                                </div>
                                <br>


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
                                <div class="form-table">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="4">

                                    </table>
                                    <table width="100%" border="0" cellspacing="1" cellpadding="4">
                                        <tbody>
                                        <tr>
                                            <td width="200" align="left" valign="middle" class="zebraodd">الموضوع:</td>
                                            <td width=""><input required name="ticketsubject" type="text" size="45"
                                                                class="swifttextwide" id="ticketsubject"
                                                                value=""><br><br></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="left" valign="top"><textarea required name="ticketmessage"
                                                                                                id="ticketmessage"
                                                                                                cols="25" rows="15"
                                                                                                class="swifttextareawide"></textarea>
                                                <div id="irscontainer" class="irscontainer">
                                                    <div class="irsui">
                                                        <div class="irstitle">جاري تحميل اقتراحات قاعدة المعرفة...</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>


                                <table class="hlineheader">
                                    <tbody>
                                    <tr>
                                        <th rowspan="2" nowrap="">ارفاق ملفات [<label for="file" class="addplus">
                                                <a class="btn btn-link" style="color: blue;"
                                                   >إضافة ملف</a></label>]
                                        </th>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td id="download" class="hlinelower d-none">uploading done</td>
                                    </tr>
                                    </tbody>
                                </table>


                                <input name="file" id="file" type="file" hidden>
                                <br>


                                <div class="subcontent">
                                    <input class="rebuttonwide2" value="إرسال" type="submit"
                                                               name="button">
                                </div>


                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="innerwrapper">
                <div id="bottomfooter" class="bottomfooterpadding"></div>
            </div>
        </div>
    </div>

@endsection