
                    <!-- HEADLINE -->
                    <div class="headline secondary">
                            <h4>{{$products->total()}}  منتج </h4>
                            <!-- SLIDE CONTROLS -->
                            <div class="slide-control-wrap" style="left: 25px;top: 18px;">
                                <a href="{!! $products->nextPageUrl() !!}">
                                    <div class="slide-control left">
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </div>
                                </a>
                                <a href="{!! $products->previousPageUrl() !!}">
                                    <div class="slide-control right">
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </div>
                                </a>
                            </div>
                            <!-- /SLIDE CONTROLS -->
                            <!-- VIEW SELECTORS -->
                            <div class="view-selectors"  style="margin-left: 112px;">
                                <a href="{{url('products')}}" class="view-selector grid "></a>
                                <a href="{{url('products_list')}}" class="view-selector list active"></a>
                            </div>
                            <!-- /VIEW SELECTORS -->
                            <form id="shop_filter_form" name="shop_filter_form">
                                <label for="price_filter" class="select-block" style="width: 162px;">
                                    <select name="price_filter" id="price_filter">
                                       <option value="hight_low">السعر (الأعلى للأدنى)</option>
                                        <option value="low_hight">السعر (الأدنى للأعلى)</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                                <label for="itemspp_filter" class="select-block" style="width: 138px;">
                                    <select name="itemspp_filter" id="itemspp_filter">
                                        <option value="0"> جميع المنتجات </option>
                                        <option value="1"> الأحدث</option>
                                        <option value="2">الأكتر مبيعا</option>
                                        <option value="3">المميز</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /HEADLINE -->

                    <!-- PRODUCT SHOWCASE -->
                    <div class="product-showcase">
                        <!-- PRODUCT LIST -->
                        <div class="product-list list">
                            <div id="show_filter">
                            @forelse($products as $key => $value)
                                <!-- PRODUCT ITEM -->
                                <div class="product-item">
                                    <a href="item-v1.html">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image small">
                                            <img src="{{asset('uploads/products/'.get_imgs($value)[0]->img)}}" alt="product-image">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->
                                    </a>

                                    <!-- PRODUCT INFO -->
                                    <div class="product-info">
                                        <a href="item-v1.html">
                                            <p class="text-header">{!! $value->products_name !!}</p>
                                        </a>
                                        <p class="product-description">{!! $value->products_desc !!}</p>
                                        <a href="shop-gridview-v1.html">
                                            <p class="category tertiary">{!! json_decode($value->products_category)->ar !!}</p>
                                        </a>
                                    </div>
                                    <!-- /PRODUCT INFO -->

                                    <!-- AUTHOR DATA -->
                                    <div class="author-data">
                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <a href="author-profile.html" class="tooltip" title="AYOUB">
                                                <figure class="user-avatar small">
                                                    <img src="{{asset('website/')}}/images/avatars/avatar_17.jpg" alt="user-avatar">
                                                </figure>
                                            </a>
                                            <a href="author-profile.html">
                                                <p class="text-header tiny">{!! $value->user_name !!}</p>
                                            </a>
                                        </div>
                                        <!-- /USER RATING -->

                                        <!-- METADATA -->
                                        <div class="metadata">
                                            <!-- META ITEM -->
                                            <div class="meta-item">
                                                <span class="icon-bubble"></span>
                                                <p>12</p>
                                            </div>
                                            <!-- /META ITEM -->

                                            <!-- META ITEM -->
                                            <div class="meta-item">
                                                <span class="icon-eye"></span>
                                                <p>210</p>
                                            </div>
                                            <!-- /META ITEM -->

                                            <!-- META ITEM -->
                                            <div class="meta-item">
                                                <span class="icon-heart"></span>
                                                <p>105</p>
                                            </div>
                                            <!-- /META ITEM -->
                                        </div>
                                        <!-- /METADATA -->
                                    </div>
                                    <!-- /AUTHOR DATA -->

                                    <!-- AUTHOR DATA REPUTATION -->
                                    <div class="author-data-reputation">
                                        <p class="text-header tiny">التقييمات</p>
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
                                    </div>
                                    <!-- /AUTHOR DATA REPUTATION -->

                                    <!-- ITEM ACTIONS -->
                                    <div class="item-actions">
                                        <a href="#" class="tooltip" title="أضف للمفضله">
                                            <div class="circle tiny">
                                                <span class="icon-heart"></span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /ITEM ACTIONS -->

                                    <!-- PRICE INFO -->
                                    <div class="price-info">
                                        <p class="price medium"><span>$</span>{!! $value->products_price !!}</p>
                                    </div>
                                    <!-- /PRICE INFO -->
                                </div>
                                <!-- /PRODUCT ITEM -->
                            @empty
                                <p>no products</p>
                            @endempty
                            </div>
                        </div>
                        <!-- /PRODUCT LIST -->
                    </div>
                    <!-- /PRODUCT SHOWCASE -->