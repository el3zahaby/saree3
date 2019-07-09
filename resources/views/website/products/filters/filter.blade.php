                           <div id="show_filter">
                                @forelse($products as $key => $value)
                                
                                <!-- PRODUCT ITEM -->
                                <div class="column product-item product-item column">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions product-preview-actions">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image product-preview-image">
                                        <img src="{{url('uploads/products/'.get_imgs($value)[0]->img)}}" alt="product-image">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->
    
                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action preview-action">
                                                <a href="{{url('/Services/1')}}">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="{{url('/Services/1')}}">
                                                    <p>إذهب للمنتج</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->
    
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action preview-action">
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
                                        <a href="{{url('/Products/1')}}">
                                            <p class="text-header">{!! $value->products_name !!}</p>
                                        </a>
                                        <p class="product-description">{!! $value->products_desc !!}</p>
                                        <a href="services.html">
                                            <p class="category secondary">{!! json_decode($value->products_category)->ar !!}</p>
                                        </a>
                                        <p class="price"><span>$</span>{!! $value->products_price !!}</p>
                                    </div>
                                    <!-- /PRODUCT INFO -->
                                    <hr class="line-separator line">
    
                                    <!-- USER RATING -->
                                    <div class="user-rating">
                                        <a href="author-profile.html">
                                            <figure class="user-avatar small">
                                                <img src="{{url('website/images/avatars/avatar_14.jpg')}}" alt="user-avatar">
                                            </figure>
                                        </a>
                                        <a href="author-profile.html">
                                            <p class="text-header tiny"> {!! $value->user_name !!}</p>
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
                                @empty
    
                                    <p>no products</p>
                                @endempty
                                </div>