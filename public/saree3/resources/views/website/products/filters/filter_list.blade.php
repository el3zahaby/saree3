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