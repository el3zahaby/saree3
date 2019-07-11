
@extends('website.layout')

@push('links')

@endpush

@section('content')



	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
            <div class="section-headline">
                <h2>المواضيع العامة</h2>
                <p>{{__("Home")}}<span class="separator">/</span>منتدى سريع<span class="separator">/</span><span class="current-section">المواضيع العامة</span></p>
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
                        <input type="image" src="{{url('website/images/search-icon.png')}}" alt="search-icon">
                    </form>
                </div>
                <!-- /SIDEBAR ITEM -->
                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item">
                    <h4>أقسام المجتمع  </h4>
                    <hr class="line-separator">
                    <!-- TOPIC PREVIEW -->
                    <div class="topic-preview">
                        
                        @forelse ($forumsec as $key => $val)
                        <!-- TOPIC PREVIEW ITEM -->
                        <div class="topic-preview-item">
                            <a href="subforum.html" class="category primary">{!! json_decode($val->title)->ar!!}</a>
                        </div>
                        <!-- /TOPIC PREVIEW ITEM -->
                        @empty

                        @endempty
                    </div>
                    <!-- /TOPIC PREVIEW -->
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
                                <a href="open-topic.html">كيف أحصل على عملاء جدد!</a>
                            </p>
                            <a href="subforum.html" class="category primary">المواضيع العامة</a>
                            <p class="lastpost">قبل دقيقتين <span>أمين بدة</span></p>
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
                <!-- FORUM -->
                <div class="forum">
                    <!-- FORUM HEADER -->
                    <div class="forum-header">
                        <div class="forum-title">
                            <p class="text-header small">{!! __("Forum") !!}</p>
                        </div>
                        <div class="forum-replies">
                            <p class="text-header small">{{__("Replies")}}</p>
                        </div>
                        <div class="forum-lastpost">
                           <p class="text-header small">{{__("Last Post")}}</p>
                        </div>
                    </div>
                    <!-- /FORUM HEADER -->

                    <!-- FORUM SECTION -->
                    <div class="forum-subsection">
                        <p class="text-header">المواضيع العامة</p>
                        <p class="description">هنا سيكون وصف خاص بتصنيف المنتدى يوضح مجاله</p>
                    </div>
                    <!-- /FORUM SECTION -->

                    <!-- THREAD LIST -->
                    <div class="thread-list">

                        @forelse ($forums as $item => $val)
                                <!-- THREAD LIST ITEM -->
                                <div class="thread-list-item pinned">
                                    <!-- PIN -->
                                {{--<span class="pin primary">Pinned</span>--}}
                                <!-- /PIN -->
                                    <figure class="user-avatar small">
                                        <img src="{{url('images/avatars/'.$val->userimage)}}" alt="">
                                    </figure>
                                    <div class="forum-title">
                                        <p class="text-header title">
                                            <a href="forum/{!! $val->threads_slug !!}">{!! $val->title !!}</a>
                                        </p>
                                    </div>

                                    <div class="forum-replies">
                                        <p class="replies">0</p>
                                    </div>

                                    <div class="forum-lastpost">
                                        <p class="lastpost"> {!! UserAt($val->threads_date) !!} <span> {!! $val->username !!}</span></p>
                                    </div>
                                </div>
                                <!-- /THREAD LIST ITEM -->
                         @empty


                         @endempty


                    </div>
                    <!-- /THREAD LIST -->
                </div>
                <!-- /FORUM -->

            </div>
            <!-- /CONTENT -->
        </div>
    </div>
    <!-- /SECTION -->

    @include('website.services')

@endsection

@push('scripts')

@endpush
