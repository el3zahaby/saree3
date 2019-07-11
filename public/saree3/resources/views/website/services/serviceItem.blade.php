@extends('website.layout')

@push('links')

@endpush

@section('content')

	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
            <div class="section-headline">
                <h2>{!! $service->services_name !!}</h2>
                <p>الرئيسية<span class="separator">/</span>خدمات<span class="separator">/</span><span class="current-section">خدممة 1 </span></p>
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
                        <p class="price large"><span>$</span>{!! $service->price !!}</p>
                        <hr class="line-separator">
                        <form id="aux_form" name="aux_form"></form>


                        <!-- /CHECKBOX -->
                        <p class="license-text" data-license="regular-license" style="display: block;">هذا مجرد نص تجريبي لمعاينة طريقة عرضه باللغة العربية.</p>

                        <!-- Button Requerment a Services -->
                        <a href="#" class="button mid dark spaced"><span class="primary"> طلب خاص </span></a>

                        <!-- /CHECKBOX -->
                        <p class="license-text" data-license="extended-license">هذا مجرد نص تجريبي لمعاينة طريقة عرضه باللغة العربية.</p>
                        <a href="#" class="button mid dark spaced"><span class="primary">الطلب الان!</span></a>
                        <a href="#" class="button mid primary half">أضف للسلة</a>
                        <a href="#" class="button mid secondary wicon half"><span class="icon-heart" style="margin-right: 6px;"></span>0</a>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- /SIDEBAR ITEM -->
                    <div class="sidebar-item product-info">
                        <h4> معلومات الخدمة</h4>
                        <hr class="line-separator">
                        <!-- INFORMATION LAYOUT -->
                        <div class="information-layout">
                             <!-- INFORMATION LAYOUT ITEM -->
                             <div class="information-layout-item">
                                    <p class="text-header">تاريخ الإدراج:</p>
                                    <p>{!! userAt($service->created_at) !!}</p>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->
                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">قيد التنفيذ:</p>
                                <p>0</p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->
                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header"> سرعة الرد :</p>
                                <p> دقيقتين</p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">تم شرائها:</p>
                                <p>  0 مرات </p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                        </div>
                        <!-- INFORMATION LAYOUT -->
                    </div>
                    <!-- /SIDEBAR ITEM -->
                    <!-- SIDEBAR ITEM -->
					<div class="sidebar-item author-bio author-badges-v2 column">
						<h4> مقدم الخدمة</h4>
						<hr class="line-separator">
						<!-- USER AVATAR -->
						<a href="user-profile.html" class="user-avatar-wrap medium">
							<figure class="user-avatar medium">
                            <img src="{{url('images/avatars/'.$service->userimage)}}" alt="">
							</figure>
						</a>
						<!-- /USER AVATAR -->
						<p class="text-header">{!! $service->user_name !!}</p>
						<p class="text-oneline">{!! $service->userjob !!}</p>
						<!-- SHARE LINKS -->
						<ul class="share-links">
							<li><a href="#" class="fb"></a></li>
							<li><a href="#" class="twt"></a></li>
							<li><a href="#" class="db"></a></li>
						</ul>
						<!-- /SHARE LINKS -->
						<p class="text-header tiny">الأوسمة</p>
						<!-- BADGE LIST -->
						<div class="badge-list short">
							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small liquid">
									<img src="{{url('website/')}}/images/badges/community/gold_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small liquid">
									<img src="{{url('website/')}}/images/badges/flags/flag_usa_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small liquid">
									<img src="{{url('website/')}}/images/badges/community/support_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small pinned liquid">
									<img src="{{url('website/')}}/images/badges/community/member_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small liquid">
                                <img src="{{url('website/')}}/images/badges/community/hunter_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small pinned liquid">
									<img src="{{url('website/')}}/images/badges/community/appreciationist_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small liquid">
									<img src="{{url('website/')}}/images/badges/community/rainbow_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->

							<!-- BADGE LIST ITEM -->
							<div class="badge-list-item">
								<figure class="badge small pinned liquid">
									<img src="{{url('website/')}}/images/badges/community/friendly_s.png" alt="">
								</figure>
							</div>
							<!-- /BADGE LIST ITEM -->
						</div>
						<!-- /BADGE LIST -->

						<div class="clearfix"></div>
						<a href="#" class="button mid dark spaced">الذهاب إلى <span class="primary">صفحة مقدم الخدمة </span></a>
						<a href="{{ route('chat.start',[$service->user_id,$service->services_id]) }}" class="button mid dark-light">تواصل معه</a>
					</div>
					<!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item author-reputation full">
                        <h4>التقييمات</h4>
                        <hr class="line-separator">
                        <!-- PIE CHART -->
                        <div class="likes">

                            <div class="like">
                                <i class="fa fa-thumbs-o-up"></i>
                                <p>12 إيجابي</p>
                            </div>
                            <div class="like">
                                <i class="fa fa-thumbs-o-down"></i>
                                <p>15 سلبي</p>
                            </div>
                        </div>
                        					<!-- PIE CHART -->
					<div class="pie-chart pie-chart1">
						<p class="text-header percent">86<span>%</span></p>
						<p class="text-header percent-info">موصى به</p>
						<!-- RATING -->
						<ul class="rating">
							<li class="rating-item">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
							<li class="rating-item">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
							<li class="rating-item">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
							<li class="rating-item">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
							<li class="rating-item empty">
								<!-- SVG STAR -->
								<svg class="svg-star">
									<use xlink:href="#svg-star"></use>
								</svg>
								<!-- /SVG STAR -->
							</li>
						</ul>
						<!-- /RATING -->
					</div>
					<!-- /PIE CHART -->
                        <a href="#" class="button mid dark-light">إقرأ جميع التقييمات</a>
                    </div>
                    <!-- /SIDEBAR ITEM -->


                </div>
                <!-- /SIDEBAR -->

                <!-- CONTENT -->
                <div class="content left">

                <!-- POST -->
				<article class="post">
					<!-- POST IMAGE -->
					<div class="post-image">
						<figure class="product-preview-image large liquid">
							<img src="{{url('uploads/services/'.get_services_imgs($service)[0]->img)}}" alt="">
						</figure>
						<!-- SLIDE CONTROLS -->
						<div class="slide-control-wrap">
							<div class="slide-control rounded left">
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</div>

							<div class="slide-control rounded right">
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</div>
						</div>
						<!-- /SLIDE CONTROLS -->
						<a href="#" class="button mid primary">المعاينة الحية</a>
					</div>
					<!-- /POST IMAGE -->

					<!-- POST IMAGE SLIDES -->
					<div class="post-image-slides">
						<!-- IMAGE SLIDES WRAP -->
						<div class="image-slides-wrap full">
							<!-- IMAGE SLIDES -->
							<div class="image-slides" data-slide-visible-full="8"
													  data-slide-visible-small="2"
													  data-slide-count="9">
							@foreach(get_services_imgs($service) as $item => $value)
								<!-- IMAGE SLIDE -->
									<div class="image-slide">
										<div class="overlay"></div>
										<figure class="product-preview-image thumbnail liquid">
											<img src="{{asset('uploads/services/'.$value->img)}}" alt="">
										</figure>
									</div>
									<!-- /IMAGE SLIDE -->
							@endforeach
							</div>
							<!-- IMAGE SLIDES -->
						</div>
						<!-- IMAGE SLIDES WRAP -->
					</div>
					<!-- /POST IMAGE SLIDES -->

					<hr class="line-separator">

					<!-- POST CONTENT -->
					<div class="post-content">
						<!-- POST PARAGRAPH -->
						<div class="post-paragraph">
							<h3 class="post-title">وصف الخدمة :</h3>
							<p>{!! $service->services_desc !!}</p>
						</div>
						<!-- /POST PARAGRAPH -->

						<!-- POST PARAGRAPH -->
						<div class="post-paragraph">
							<h3 class="post-title small">Westeros HTML Instructions</h3>
							<p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<!-- /POST PARAGRAPH -->

						<!-- POST PARAGRAPH -->
						<div class="post-paragraph half">
							<h3 class="post-title small">List Items (Unordered)</h3>
							<!-- POST ITEM LIST -->
							<ul class="post-item-list">
								<li>
									<!-- SVG CHECK -->
									<svg class="svg-check bullet-icon">
										<use xlink:href="#svg-check"></use>
									</svg>
									<!-- /SVG CHECK -->
									<p>Lorem ipsum dolor sit amet</p>
								</li>
								<li>
									<!-- SVG CHECK -->
									<svg class="svg-check bullet-icon">
										<use xlink:href="#svg-check"></use>
									</svg>
									<!-- /SVG CHECK -->
									<p>Nostrud Exertation</p>
								</li>
								<li>
									<!-- SVG CHECK -->
									<svg class="svg-check bullet-icon">
										<use xlink:href="#svg-check"></use>
									</svg>
									<!-- /SVG CHECK -->
									<p>Laborum: Lorem ipsum dolor sit </p>
								</li>
								<li>
									<!-- SVG CHECK -->
									<svg class="svg-check bullet-icon">
										<use xlink:href="#svg-check"></use>
									</svg>
									<!-- /SVG CHECK -->
									<p>Lorem ipsum dolor sit amet</p>
								</li>
								<li>
									<!-- SVG CHECK -->
									<svg class="svg-check bullet-icon">
										<use xlink:href="#svg-check"></use>
									</svg>
									<!-- /SVG CHECK -->
									<p>Nostrud Exertation</p>
								</li>
							</ul>
							<!-- POST ITEM LIST -->
						</div>
						<!-- /POST PARAGRAPH -->

						<!-- POST PARAGRAPH -->
						<div class="post-paragraph half">
							<h3 class="post-title small">List Items (Ordered)</h3>
							<!-- POST ITEM LIST -->
							<ul class="post-item-list">
								<li>
									<p class="bullet-icon">1-</p>
									<p>Lorem ipsum dolor sit amet</p>
								</li>
								<li>
									<p class="bullet-icon">2-</p>
									<p>Nostrud Exertation</p>
								</li>
								<li>
									<p class="bullet-icon">3-</p>
									<p>Laborum: Lorem ipsum dolor sit </p>
								</li>
								<li>
									<p class="bullet-icon">4-</p>
									<p>Lorem ipsum dolor sit amet</p>
								</li>
								<li>
									<p class="bullet-icon">5-</p>
									<p>Nostrud Exertation</p>
								</li>
							</ul>
							<!-- POST ITEM LIST -->
						</div>
						<!-- /POST PARAGRAPH -->

						<div class="clearfix"></div>
					</div>
					<!-- /POST CONTENT -->

					<hr class="line-separator">

					<!-- SHARE -->
					<div class="share-links-wrap">
						<p class="text-header small">مشاركة:</p>
						<!-- SHARE LINKS -->
						<ul class="share-links hoverable">
							<li><a href="#" class="fb"></a></li>
							<li><a href="#" class="twt"></a></li>
							<li><a href="#" class="db"></a></li>
							<li><a href="#" class="rss"></a></li>
							<li><a href="#" class="gplus"></a></li>
						</ul>
						<!-- /SHARE LINKS -->
					</div>
					<!-- /SHARE -->
				</article>
				<!-- /POST -->


                    <!-- POST TAB -->
                    <div class="post-tab">
                        <!-- TAB HEADER -->
                        <div class="tab-header primary">
                            <!-- TAB ITEM -->
                            <div class="tab-item selected">
                                <p class="text-header">التعليقات(35)</p>
                            </div>
                            <!-- /TAB ITEM -->


                            <!-- TAB ITEM -->
                            <div class="tab-item" style="float: left;">
                               <!-- <p class="text-header">معلومات هامة</p>-->
                               <select class="stars-select" name="" id="" style="margin: 11px -9px;color:#2b2b2b;">
                                   <option value=""> أحدت التقييمات </option>
                                   <option value="">التقييمات الإيجابية</option>
                                   <option value="">التقييمات السلبية</option>
                                   <!-- SVG ARROW -->

                               </select>
                               <svg class="svg-arrow select-arow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                            </div>
                            <!-- /TAB ITEM -->
                        </div>
                        <!-- /TAB HEADER -->

                        <!-- TAB CONTENT -->
                        <div class="tab-content void">
                            <!-- COMMENTS -->
                            <div class="comment-list">
                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="{{url('website/')}}/images/avatars/avatar_06.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">المعاينة كعميل</p>
                                        <!-- PIN -->
                                        <span class="pin greyed">مشتري</span>
                                        <!-- /PIN -->
                                        <p class="timestamp">5 Hours Ago</p>
                                        <a href="#" class="التبليغ">التبليغ</a>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="{{url('website/')}}/images/avatars/avatar_11.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">المعاينة كبائع (الردود)</p>
                                        <p class="timestamp">8 Hours Ago</p>
                                        <a href="#" class="التبليغ">التبليغ</a>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="{{url('website/')}}/images/avatars/avatar_09.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->

                                    <!-- COMMENT REPLY FORM -->
                                    <form class="comment-reply-form">
                                        <textarea name="treply1" placeholder="أكتب تعليقك هنا...."></textarea>
                                        <!-- CHECKBOX -->
                                        <input type="checkbox" id="notif1" name="notif1" checked>
                                        <label for="notif1">
                                            <span class="checkbox primary"><span></span></span>
                                            التوصل بالإشعارات عبر البريد
                                        </label>
                                        <!-- /CHECKBOX -->
                                        <button class="button primary">ضع تعليق</button>
                                    </form>
                                    <!-- /COMMENT REPLY FORM -->
                                </div>
                                <!-- /COMMENT REPLY -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="{{url('website/')}}/images/avatars/avatar_12.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">المعاينة كبائع (الردود)</p>
                                        <p class="timestamp">10 Hours Ago</p>
                                        <a href="#" class="التبليغ">التبليغ</a>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    </div>

                                    <!-- COMMENT -->
                                    <div class="comment-wrap">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="{{url('website/')}}/images/avatars/avatar_09.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->
                                        <div class="comment">
                                            <p class="text-header">أحمد حسين</p>
                                            <!-- PIN -->
                                            <span class="pin">Author</span>
                                            <!-- /PIN -->
                                            <p class="timestamp">2 Hours Ago</p>
                                            <a href="#" class="التبليغ">التبليغ</a>
                                            <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                        </div>
                                    </div>
                                    <!-- /COMMENT -->

                                    <!-- COMMENT -->
                                    <div class="comment-wrap">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="{{url('website/')}}/images/avatars/avatar_12.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->
                                        <div class="comment">
                                            <p class="text-header">Customer Reply</p>
                                            <p class="timestamp">2 Hours Ago</p>
                                            <a href="#" class="التبليغ">التبليغ</a>
                                            <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magnada. Ut enim ad minim veniam onsectetur elit</p>
                                        </div>
                                    </div>
                                    <!-- /COMMENT -->

                                    <!-- COMMENT REPLY -->
                                    <div class="comment-wrap comment-reply">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="{{url('website/')}}/images/avatars/avatar_09.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->

                                        <!-- COMMENT REPLY FORM -->
                                        <form class="comment-reply-form">
                                            <textarea name="treply2" placeholder="أكتب تعليقك هنا..."></textarea>
                                            <!-- CHECKBOX -->
                                            <input type="checkbox" id="notif2" name="notif2" checked>
                                            <label for="notif2">
                                                <span class="checkbox primary"><span></span></span>
                                                التوصل بالإشعارات عبر البريد
                                            </label>
                                            <!-- /CHECKBOX -->
                                            <button class="button primary">ضع تعليق</button>
                                        </form>
                                        <!-- /COMMENT REPLY FORM -->
                                    </div>
                                    <!-- /COMMENT REPLY -->
                                </div>
                                <!-- /COMMENT -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="{{url('website/')}}/images/avatars/avatar_03.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">المعاينة كعميل</p>
                                        <p class="timestamp">6 Days Ago</p>
                                        <a href="#" class="التبليغ">التبليغ</a>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- PAGER -->
                                <div class="pager primary">
                                    <div class="pager-item"><p>1</p></div>
                                    <div class="pager-item active"><p>2</p></div>
                                    <div class="pager-item"><p>3</p></div>
                                    <div class="pager-item"><p>...</p></div>
                                    <div class="pager-item"><p>17</p></div>
                                </div>
                                <!-- /PAGER -->

                                <div class="clearfix"></div>

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <h3>أترك تعليق</h3>

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="{{url('website/')}}/images/avatars/avatar_09.jpg" alt="">
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
                            <!-- /COMMENTS -->
                        </div>
                        <!-- /TAB CONTENT -->


                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <!-- ITEM-FAQ -->
                            <div class="accordion item-faq primary">
                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">إقرأ قبل الشراء</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">كيف تعمل المزايدة</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">سياسة الإسترجاع</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">الشحن و التوصيل</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">ضمان الجودة</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->
                            </div>
                            <!-- /ITEM-FAQ -->
                        </div>
                        <!-- /TAB CONTENT -->
                    </div>
                    <!-- /POST TAB -->
                </div>
                <!-- CONTENT -->
            </div>
        </div>
        <!-- /SECTION -->

        
        @include('website.services')



@endsection

@push('scripts')
<!-- ImgLiquid -->
<script src="{{url('website/')}}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{{url('website/')}}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Liquid -->
<script src="{{url('website/')}}/js/liquid.js"></script>
<!-- Checkbox Link -->
<script src="{{url('website/')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{url('website/')}}/js/image-slides.js"></script>
<!-- Post Tab -->
<script src="{{url('website/')}}/js/post-tab.js"></script>
<!-- XM Accordion -->
<script src="{{url('website/')}}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- XM Pie Chart -->
    <script src="{{url('website/js/vendor/jquery.xmpiechart.min.js')}}"></script>

<!-- Item V1 -->
    <script src="{{url('website/js/item-v1.js')}}"></script>
    <!-- Item V1 -->
    <script src="{{url('website/js/slider-js.js')}}"></script>


@endpush
