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
            <a href="{{url('products')}}" class="view-selector grid active"></a>
            <a href="{{url('products_list')}}" class="view-selector list"></a>
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
            <div class="product-list grid column3-4-wrap column3-4-wrap">
              
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
            
            <!-- /PRODUCT LIST -->


        </div>
        <!-- /PRODUCT SHOWCASE --> 

        