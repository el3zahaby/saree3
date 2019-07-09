@extends('website.layout')

@push('links')

@endpush

@section('content')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
		<div class="section-headline">
			<h2>
                @if (count($product)) 
                    {{$product->product_name}}
                @endif

            </h2>
			<p>الرئيسية<span class="separator">/</span>المنتجات<span class="separator">/</span><span class="current-section">الشواحن</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar right">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item void buttons">
					<a href="#" class="button big dark purchase">
						<span class="currency">{{$product->product_price}}</span>
						<span>شراء الان!</span>
					</a>
					<a href="#" class="button big tertiary wcart">
						<span class="icon-present"></span>
						أضف للسلة
					</a>
					<a href="#" class="button big secondary wfav">
						<span class="icon-heart"></span>
						<span class="fav-count">652</span>
						أضف للمفضلة
					</a>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-bio">
					<h4>بائع المنتج</h4>
					<hr class="line-separator">
					<!-- USER AVATAR -->
					<a href="user-profile.html" class="user-avatar-wrap medium">
						<figure class="user-avatar medium">
                        <img src="{{url('website/')}}/images/avatars/avatar_17.jpg" alt="">
						</figure>
					</a>
					<!-- /USER AVATAR -->
					<p class="text-header"> {!!$product->user_name !!}</p>
					<p class="text-oneline">هذا مجرد نص تجريبي<br>لمعاينة النبذة الخاصة بالبائع</p>
					<!-- SHARE LINKS -->
					<ul class="share-links">
						<li><a href="#" class="fb"></a></li>
						<li><a href="#" class="twt"></a></li>
						<li><a href="#" class="db"></a></li>
					</ul>
					<!-- /SHARE LINKS -->
					<a href="#" class="button mid dark spaced">زيارةالملف الشخصي</a>
					<a href="#" class="button mid dark-light">أرسل رسالة خاصة</a>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item product-info">
					<h4>معلومات عن المنتج</h4>
					<hr class="line-separator">
					<!-- INFORMATION LAYOUT -->
					<div class="information-layout">
						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">تاريخ النشر:</p>
							<p>August 18th, 2015</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">حالة المنتج:</p>
							<p>جديد</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">دولة المنتج:</p>
							<p>الأردن</p>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header"> الشحن :</p>
                            <p>مجاني </p>
                            
						</div>
                        <!-- /INFORMATION LAYOUT ITEM -->

                        <!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
                                <p class="text-header"> سرعة الشحن :</p>
                                <p>يوم </p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

					</div>
					<!-- INFORMATION LAYOUT -->
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item author-reputation full">
					<h4>التقييمات</h4>
					<hr class="line-separator">
					<!-- PIE CHART -->
					<div class="pie-chart pie-chart1">
						<p class="text-header percent">24<span>%</span></p>
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
							<li class="rating-item empty">
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
							<li class="rating-item empty">
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
					<a href="#" class="button mid dark-light">عرض جميع التقييمات</a>
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
							<img src="{{url('uploads/services/'.$product->product_image1)}}" alt="">
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
								<!-- IMAGE SLIDE -->
								<div class="image-slide selected">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image1)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->

								<!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image2)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->

                                @if (!is_null($product->product_image3))
                                <!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image3)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
                                @endif

                                @if (!is_null($product->product_image4))
                                <!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image4)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
                                @endif

                                @if (!is_null($product->product_image5))
                                <!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image5)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
                                @endif

                                @if (!is_null($product->product_image6))
                                <!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image6)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
                                @endif

                                @if (!is_null($product->product_image7))
                                <!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image7)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
                                @endif

                                @if (!is_null($product->product_image8))
                                <!-- IMAGE SLIDE -->
								<div class="image-slide">
									<div class="overlay"></div>
									<figure class="product-preview-image thumbnail liquid">
										<img src="{{url('uploads/services/'.$product->product_image8)}}" alt="">
									</figure>
								</div>
								<!-- /IMAGE SLIDE -->
                                @endif
							

						
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
							<h3 class="post-title">وصف المنتج : </h3>


                            {!!$product->product_desc!!}
							
                        </div>
						<!-- /POST PARAGRAPH -->

						<!-- POST PARAGRAPH -->
						<div class="post-paragraph" style="margin-top: 28px;">
							<h3 class="post-title small">حجم المنتج :</h3>
							<p>هذا نص تجريبي فقط ولا يعني أي شيئ هو لمجرد التجربة و المعاينة فقط  incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation هاذا نص تجريبي و لا يعني أي شيئ المرجو تجاهله هو للتجربة فقط و غير مهم بأي حال من الأحوال.. </p>
						</div>
						<!-- /POST PARAGRAPH -->


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



                <div class="products-par">
                    <div class="title">
                        <h2>منتجات أخرى للبائع</h2>
                    </div>

                <!-- PRODUCT SHOWCASE -->
				<div class="product-showcase">
					<!-- PRODUCT LIST -->
					<div class="product-list grid column3-4-wrap">
						<!-- PRODUCT ITEM -->
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->

								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<div class="preview-action">
										<a href="service-page.html">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="service-page.html">
											<p>إذهب للمنتج</p>
										</a>
									</div>
									<!-- /PREVIEW ACTION -->

									<!-- PREVIEW ACTION -->
									<div class="preview-action">
										<a href="#">
											<div class="circle tiny secondary">
												<span class="icon-heart"></span>
											</div>
										</a>
										<a href="#">
											<p>إضافة للمفضلة</p>
										</a>
									</div>
									<!-- /PREVIEW ACTION -->
								</div>
								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PRODUCT PREVIEW ACTIONS -->

							<!-- PRODUCT INFO -->
							<div class="product-info">
								<a href="service-page.html">
									<p class="text-header">لوجو شركة إحترافي</p>
								</a>
								<p class="product-description">هنا يكون وصف المنتج القصير...</p>
								<a href="services.html">
									<p class="category secondary">الجرافيك</p>
								</a>
								<p class="price"><span>$</span>260</p>
							</div>
							<!-- /PRODUCT INFO -->
							<hr class="line-separator">

							<!-- USER RATING -->
							<div class="user-rating">
								<a href="author-profile.html">
									<figure class="user-avatar small">
										<img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
									</figure>
								</a>
								<a href="author-profile.html">
									<p class="text-header tiny">حمزة بدة</p>
								</a>
								<ul class="rating tooltip" title="التقييمات">
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
							</div>
							<!-- /USER RATING -->
						</div>
                        <!-- /PRODUCT ITEM -->

                        						<!-- PRODUCT ITEM -->
						<div class="product-item column">
                                <!-- PRODUCT PREVIEW ACTIONS -->
                                <div class="product-preview-actions">
                                    <!-- PRODUCT PREVIEW IMAGE -->
                                    <figure class="product-preview-image">
                                        <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image">
                                    </figure>
                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                    <!-- PREVIEW ACTIONS -->
                                    <div class="preview-actions">
                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action">
                                            <a href="service-page.html">
                                                <div class="circle tiny primary">
                                                    <span class="icon-tag"></span>
                                                </div>
                                            </a>
                                            <a href="service-page.html">
                                                <p>إذهب للمنتج</p>
                                            </a>
                                        </div>
                                        <!-- /PREVIEW ACTION -->

                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action">
                                            <a href="#">
                                                <div class="circle tiny secondary">
                                                    <span class="icon-heart"></span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <p>إضافة للمفضلة</p>
                                            </a>
                                        </div>
                                        <!-- /PREVIEW ACTION -->
                                    </div>
                                    <!-- /PREVIEW ACTIONS -->
                                </div>
                                <!-- /PRODUCT PREVIEW ACTIONS -->

                                <!-- PRODUCT INFO -->
                                <div class="product-info">
                                    <a href="service-page.html">
                                        <p class="text-header">لوجو شركة إحترافي</p>
                                    </a>
                                    <p class="product-description">هنا يكون وصف المنتج القصير...</p>
                                    <a href="services.html">
                                        <p class="category secondary">الجرافيك</p>
                                    </a>
                                    <p class="price"><span>$</span>260</p>
                                </div>
                                <!-- /PRODUCT INFO -->
                                <hr class="line-separator">

                                <!-- USER RATING -->
                                <div class="user-rating">
                                    <a href="author-profile.html">
                                        <figure class="user-avatar small">
                                            <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                        </figure>
                                    </a>
                                    <a href="author-profile.html">
                                        <p class="text-header tiny">حمزة بدة</p>
                                    </a>
                                    <ul class="rating tooltip" title="التقييمات">
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
                                </div>
                                <!-- /USER RATING -->
                            </div>
                            <!-- /PRODUCT ITEM -->


                            						<!-- PRODUCT ITEM -->
						<div class="product-item column">
                                <!-- PRODUCT PREVIEW ACTIONS -->
                                <div class="product-preview-actions">
                                    <!-- PRODUCT PREVIEW IMAGE -->
                                    <figure class="product-preview-image">
                                        <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image">
                                    </figure>
                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                    <!-- PREVIEW ACTIONS -->
                                    <div class="preview-actions">
                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action">
                                            <a href="service-page.html">
                                                <div class="circle tiny primary">
                                                    <span class="icon-tag"></span>
                                                </div>
                                            </a>
                                            <a href="service-page.html">
                                                <p>إذهب للمنتج</p>
                                            </a>
                                        </div>
                                        <!-- /PREVIEW ACTION -->

                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action">
                                            <a href="#">
                                                <div class="circle tiny secondary">
                                                    <span class="icon-heart"></span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <p>إضافة للمفضلة</p>
                                            </a>
                                        </div>
                                        <!-- /PREVIEW ACTION -->
                                    </div>
                                    <!-- /PREVIEW ACTIONS -->
                                </div>
                                <!-- /PRODUCT PREVIEW ACTIONS -->

                                <!-- PRODUCT INFO -->
                                <div class="product-info">
                                    <a href="service-page.html">
                                        <p class="text-header">لوجو شركة إحترافي</p>
                                    </a>
                                    <p class="product-description">هنا يكون وصف المنتج القصير...</p>
                                    <a href="services.html">
                                        <p class="category secondary">الجرافيك</p>
                                    </a>
                                    <p class="price"><span>$</span>260</p>
                                </div>
                                <!-- /PRODUCT INFO -->
                                <hr class="line-separator">

                                <!-- USER RATING -->
                                <div class="user-rating">
                                    <a href="author-profile.html">
                                        <figure class="user-avatar small">
                                        <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                        </figure>
                                    </a>
                                    <a href="author-profile.html">
                                        <p class="text-header tiny">حمزة بدة</p>
                                    </a>
                                    <ul class="rating tooltip" title="التقييمات">
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
                                </div>
                                <!-- /USER RATING -->
                            </div>
                            <!-- /PRODUCT ITEM -->

                    </div>
                </div>
                            </div>



                            <div class="products-par">
                                    <div class="title" style="margin-top:-7px;">
                                        <h2>منتجات مشابهه</h2>
                                    </div>

                                <!-- PRODUCT SHOWCASE -->
                                <div class="product-showcase">
                                    <!-- PRODUCT LIST -->
                                    <div class="product-list grid column3-4-wrap">
                                        <!-- PRODUCT ITEM -->
                                        <div class="product-item column">
                                            <!-- PRODUCT PREVIEW ACTIONS -->
                                            <div class="product-preview-actions">
                                                <!-- PRODUCT PREVIEW IMAGE -->
                                                <figure class="product-preview-image">
                                                    <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image">
                                                </figure>
                                                <!-- /PRODUCT PREVIEW IMAGE -->

                                                <!-- PREVIEW ACTIONS -->
                                                <div class="preview-actions">
                                                    <!-- PREVIEW ACTION -->
                                                    <div class="preview-action">
                                                        <a href="service-page.html">
                                                            <div class="circle tiny primary">
                                                                <span class="icon-tag"></span>
                                                            </div>
                                                        </a>
                                                        <a href="service-page.html">
                                                            <p>إذهب للمنتج</p>
                                                        </a>
                                                    </div>
                                                    <!-- /PREVIEW ACTION -->

                                                    <!-- PREVIEW ACTION -->
                                                    <div class="preview-action">
                                                        <a href="#">
                                                            <div class="circle tiny secondary">
                                                                <span class="icon-heart"></span>
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <p>إضافة للمفضلة</p>
                                                        </a>
                                                    </div>
                                                    <!-- /PREVIEW ACTION -->
                                                </div>
                                                <!-- /PREVIEW ACTIONS -->
                                            </div>
                                            <!-- /PRODUCT PREVIEW ACTIONS -->

                                            <!-- PRODUCT INFO -->
                                            <div class="product-info">
                                                <a href="service-page.html">
                                                    <p class="text-header">لوجو شركة إحترافي</p>
                                                </a>
                                                <p class="product-description">هنا يكون وصف المنتج القصير...</p>
                                                <a href="services.html">
                                                    <p class="category secondary">الجرافيك</p>
                                                </a>
                                                <p class="price"><span>$</span>260</p>
                                            </div>
                                            <!-- /PRODUCT INFO -->
                                            <hr class="line-separator">

                                            <!-- USER RATING -->
                                            <div class="user-rating">
                                                <a href="author-profile.html">
                                                    <figure class="user-avatar small">
                                                        <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                                    </figure>
                                                </a>
                                                <a href="author-profile.html">
                                                    <p class="text-header tiny">حمزة بدة</p>
                                                </a>
                                                <ul class="rating tooltip" title="التقييمات">
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
                                            </div>
                                            <!-- /USER RATING -->
                                        </div>
                                        <!-- /PRODUCT ITEM -->

                                        <!-- PRODUCT ITEM -->
                                        <div class="product-item column">
                                                <!-- PRODUCT PREVIEW ACTIONS -->
                                                <div class="product-preview-actions">
                                                    <!-- PRODUCT PREVIEW IMAGE -->
                                                    <figure class="product-preview-image">
                                                        <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image">
                                                    </figure>
                                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                                    <!-- PREVIEW ACTIONS -->
                                                    <div class="preview-actions">
                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="service-page.html">
                                                                <div class="circle tiny primary">
                                                                    <span class="icon-tag"></span>
                                                                </div>
                                                            </a>
                                                            <a href="service-page.html">
                                                                <p>إذهب للمنتج</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->

                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="#">
                                                                <div class="circle tiny secondary">
                                                                    <span class="icon-heart"></span>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <p>إضافة للمفضلة</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->
                                                    </div>
                                                    <!-- /PREVIEW ACTIONS -->
                                                </div>
                                                <!-- /PRODUCT PREVIEW ACTIONS -->

                                                <!-- PRODUCT INFO -->
                                                <div class="product-info">
                                                    <a href="service-page.html">
                                                        <p class="text-header">لوجو شركة إحترافي</p>
                                                    </a>
                                                    <p class="product-description">هنا يكون وصف المنتج القصير...</p>
                                                    <a href="services.html">
                                                        <p class="category secondary">الجرافيك</p>
                                                    </a>
                                                    <p class="price"><span>$</span>260</p>
                                                </div>
                                                <!-- /PRODUCT INFO -->
                                                <hr class="line-separator">

                                                <!-- USER RATING -->
                                                <div class="user-rating">
                                                    <a href="author-profile.html">
                                                        <figure class="user-avatar small">
                                                            <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                                        </figure>
                                                    </a>
                                                    <a href="author-profile.html">
                                                        <p class="text-header tiny">حمزة بدة</p>
                                                    </a>
                                                    <ul class="rating tooltip" title="التقييمات">
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
                                                </div>
                                                <!-- /USER RATING -->
                                            </div>
                                            <!-- /PRODUCT ITEM -->


                                        <!-- PRODUCT ITEM -->
                                        <div class="product-item column">
                                                <!-- PRODUCT PREVIEW ACTIONS -->
                                                <div class="product-preview-actions">
                                                    <!-- PRODUCT PREVIEW IMAGE -->
                                                    <figure class="product-preview-image">
                                                        <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image">
                                                    </figure>
                                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                                    <!-- PREVIEW ACTIONS -->
                                                    <div class="preview-actions">
                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="service-page.html">
                                                                <div class="circle tiny primary">
                                                                    <span class="icon-tag"></span>
                                                                </div>
                                                            </a>
                                                            <a href="service-page.html">
                                                                <p>إذهب للمنتج</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->

                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="#">
                                                                <div class="circle tiny secondary">
                                                                    <span class="icon-heart"></span>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <p>إضافة للمفضلة</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->
                                                    </div>
                                                    <!-- /PREVIEW ACTIONS -->
                                                </div>
                                                <!-- /PRODUCT PREVIEW ACTIONS -->

                                                <!-- PRODUCT INFO -->
                                                <div class="product-info">
                                                    <a href="service-page.html">
                                                        <p class="text-header">لوجو شركة إحترافي</p>
                                                    </a>
                                                    <p class="product-description">هنا يكون وصف المنتج القصير...</p>
                                                    <a href="services.html">
                                                        <p class="category secondary">الجرافيك</p>
                                                    </a>
                                                    <p class="price"><span>$</span>260</p>
                                                </div>
                                                <!-- /PRODUCT INFO -->
                                                <hr class="line-separator">

                                                <!-- USER RATING -->
                                                <div class="user-rating">
                                                    <a href="author-profile.html">
                                                        <figure class="user-avatar small">
                                                        <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                                        </figure>
                                                    </a>
                                                    <a href="author-profile.html">
                                                        <p class="text-header tiny">حمزة بدة</p>
                                                    </a>
                                                    <ul class="rating tooltip" title="التقييمات">
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
                                                </div>
                                                <!-- /USER RATING -->
                                            </div>
                                            <!-- /PRODUCT ITEM -->

                                    </div>
                                </div>
                            </div>





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

<script src="{{asset('website/')}}/lib/popper.js/popper.js"></script>


<!-- Product Page -->
<script src="{{url('website/')}}/js/product-page.js"></script>
<!-- Item V1 -->
<script src="{{url('website/js/slider-js.js')}}"></script>
@endpush
