

@extends('website.layout')

@push('links')

@endpush

@section('content')

    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap">
    <div class="section-headline">
        <h2>المواضيع العامة</h2>
        <p>الرئيسية<span class="separator">/</span>منتدى سريع<span class="separator">/</span><span class="current-section">المواضيع العامة</span></p>
    </div>
    </div>
    <!-- /SECTION HEADLINE -->

    <!-- SECTION -->
    <div class="section-wrap">
    <div class="section">
        <!-- SIDEBAR -->
        <div class="sidebar right">
            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item">
                <h4>البحث</h4>
                <hr class="line-separator">
                <form class="search-form">
                    <input type="text" class="rounded" name="search" id="search_topics" placeholder="البحث عن المواضيع هنا...">
                    <input type="image" src="{{asset("website/")}}/images/search-icon.png" alt="search-icon">
                </form>
            </div>
            <!-- /SIDEBAR ITEM -->

            <!-- SIDEBAR ITEM -->
            <div class="sidebar-item">
                <h4>أشهر المواضيع</h4>
                <hr class="line-separator">
                <!-- TOPIC PREVIEW -->
                <div class="topic-preview">
                    <!-- TOPIC PREVIEW ITEM -->
                    <div class="topic-preview-item">
                        <p class="text-header small">
                            <a href="open-topic.html">{!! $forum->title !!}</a>
                        </p>
                        <a href="subforum.html" class="category primary">المواضيع العامة</a>
                        <p class="lastpost">قبل دقيقتين <span>{!! $forum->username !!}</span></p>
                    </div>
                    <!-- /TOPIC PREVIEW ITEM -->

                    <!-- TOPIC PREVIEW ITEM -->
                    <div class="topic-preview-item">
                        <p class="text-header small">
                            <a href="open-topic.html">أحتاج للمساعدة في تنصيب قالب</a>
                        </p>
                        <a href="subforum.html" class="category primary">الدعم الفني</a>
                        <p class="lastpost">قبل دقيقتين من <span>أمين بدة</span></p>
                    </div>
                    <!-- /TOPIC PREVIEW ITEM -->

                    <!-- TOPIC PREVIEW ITEM -->
                    <div class="topic-preview-item">
                        <p class="text-header small">
                            <a href="open-topic.html">قل لنا أفضل مغني لديك</a>
                        </p>
                        <a href="subforum.html" class="category primary">المواضيع العامة</a>
                        <p class="lastpost">قبل 41 دقيقة من <span>حسين مستقل</span></p>
                    </div>
                    <!-- /TOPIC PREVIEW ITEM -->

                    <!-- TOPIC PREVIEW ITEM -->
                    <div class="topic-preview-item">
                        <p class="text-header small">
                            <a href="open-topic.html">أبحث عن مصمم محترف</a>
                        </p>
                        <a href="subforum.html" class="category primary">الطلبات</a>
                        <p class="lastpost">قبل 27 دقيقة <span>حسين مستقل</span></p>
                    </div>
                    <!-- /TOPIC PREVIEW ITEM -->
                </div>
                <!-- /TOPIC PREVIEW -->
            </div>
            <!-- /SIDEBAR ITEM -->
        </div>
        <!-- /SIDEBAR -->

        <!-- CONTENT -->
        <div class="content left">
            <!-- THREAD -->
            <div class="thread">
                <!-- THREAD TITLE -->
                <div class="thread-title pinned">
                    {{--<span class="pin primary">Pinned</span>--}}
                    <p class="text-header">{!! $forum->title !!}</p>
                </div>
                <!-- /THREAD TITLE -->

                <!-- التعليقات -->
                <div class="comment-list">
                    <!-- COMMENT -->
                    <div class="comment-wrap">
                        <!-- USER AVATAR -->
                        <a href="user-profile.html">
                            <figure class="user-avatar medium">
                                <img src="{{asset("website/")}}/images/avatars/avatar_06.jpg" alt="">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <div class="comment">
                            <p class="text-header">سارة أحمد</p>
                            <p class="timestamp">1 Week Ago</p>
                            <a href="#" class="reply">Quote</a>
                            <a href="#" class="التبليغ">التبليغ</a>
                            <p>هاذا نص تجريبي و لا يعني أي شيئ المرجو تجاهله هو للتجربة فقط و غير مهم بأي حال من الأحوال. هاذا نص تجريبي و لا يعني أي شيئ المرجو تجاهله هو للتجربة فقط و غير مهم بأي حال من الأحوال..</p>
                        </div>
                    </div>
                    <!-- /COMMENT -->

                    <!-- PAGER -->

                    <!-- /PAGER -->

                    <div class="clearfix"></div>

                    <!-- LINE SEPARATOR -->
                    <hr class="line-separator">
                    <!-- /LINE SEPARATOR -->

                    <h3>أترك تعليق</h3>

                    <!-- COMMENT REPLY -->
                    <div class="comment-wrap comment-reply">
                        <!-- USER AVATAR -->
                        <a href="/profile/{!! user()->slug !!}">
                            <figure class="user-avatar medium">
                                <img src="{{asset("images/avatars/".user()->image)}}" alt="">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->

                        <!-- COMMENT REPLY FORM -->
                        <form class="comment-reply-form">
                            <textarea name="treply1" placeholder="أكتب تعليقك هنا..."></textarea>
                            <button class="button primary">ضع تعليق</button>
                        </form>
                        <!-- /COMMENT REPLY FORM -->
                    </div>
                    <!-- /COMMENT REPLY -->
                </div>
                <!-- /التعليقات -->
            </div>
            <!-- /THREAD -->
        </div>
        <!-- /CONTENT -->
    </div>
    </div>
    <!-- /SECTION -->

    @include('website.services')

@endsection

@push('scripts')

@endpush
