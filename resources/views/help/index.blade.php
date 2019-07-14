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

                    <div id="corewidgetbox">
                        <div class="widgetrow">
                            <span
                                    onclick="javascript: window.location.href='{{ route("help.list") }}';"><a
                                        href="{{ route('help.list') }}"
                                        class="widgetrowitem defaultwidget"
                                        style="background-image: URL('https://help.hsoub.com/__swift/files/file_gh0w4spefe2ufsu.png');"
                                        title="تذاكري"><span class="widgetitemtitle">تذاكري</span></a>
                            </span>
                            <span
                                    onclick="javascript: window.location.href='{{ route('help.submit') }}';"><a
                                        href="{{ route('help.submit') }}" class="widgetrowitem defaultwidget"
                                        style="background-image: URL('https://help.hsoub.com/__swift/files/file_g4b9z0xdf8svy12.png');"
                                        title="فتح تذكرة"><span class="widgetitemtitle">فتح تذكرة</span></a></span>
                        </div>
                    </div>

                    <div class="boxcontainer">
                        <div class="boxcontainerlabel">مرحبًا بك بمركز المساعده </div>

                        <div class="boxcontainercontent">

                            <table cellpadding="0" cellspacing="0" border="0" class="containercontenttable">

                                <tbody>
                                <tr>
                                    <td colspan="2" class="newscontents">
                                        <p>أنت الآن مسجّل دخول. استخدم حسابك في مركز الدعم الفني للتواصل معنا حول كل&nbsp;ما
                                            يخص الموقع ومنتجاتنا .</p>
                                        <ul>
{{--                                            <li>إن كنت تواجه مشكلة باستخدام مركز المساعدة، تواصل معنا من خلال البريد--}}
{{--                                                الالكتروني:--}}
{{--                                            </li>--}}
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="text/javascript"> $(function () {
                            $('.dialogerror, .dialoginfo, .dialogalert').fadeIn('slow');
                            $("form").on("submit", function (e) {
                                $(this).find("input:submit").attr("disabled", "disabled");
                            });
                        });

                        function showEditorValidationError() {
                        }</script>
                </div>

                <script type="text/javascript">
                    if (self === top) {
                        var antiClickjack = document.getElementById("antiClickjack");
                        antiClickjack.parentNode.removeChild(antiClickjack);
                    } else {
                        top.location = self.location;
                    }
                </script>
            </div>
            <div class="innerwrapper">
                <div id="bottomfooter" class="bottomfooterpadding"></div>
            </div>
        </div>
    </div>

@endsection