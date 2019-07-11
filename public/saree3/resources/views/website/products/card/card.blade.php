
                                <span class="icon-basket" style="font-size:21px">
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow" style="top:7px;">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </span>

    <!-- PIN -->
    <span class="pin soft-edged secondary">{!! $card::content()->count() !!}</span>
    <!-- /PIN -->

    <!-- DROPDOWN CART -->
    <ul class="dropdown cart closed">

    @forelse($card::content() as $item)


        <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="item-v1.html" class="link-to"></a>
                <!-- SVG PLUS -->
                <svg class="svg-plus">
                    <use xlink:href="#svg-plus"></use>
                </svg>
                <!-- /SVG PLUS -->
                <div class="dropdown-triangle"></div>
                <figure class="product-preview-image tiny">
                    <img src="{{ url('website/images/items') }}/pixel_s.jpg" alt="">
                </figure>
                <p class="text-header tiny"> ({!! $item->qty !!}) {!! $item->name !!} </p>
                <p class="category tiny primary">{!! check_name_section($item->options->category) !!}</p>
                <p class="price tiny"><span>$</span>{!! $item->price !!}</p>

            </li>
            <!-- /DROPDOWN ITEM -->

    @empty

    @endempty


    <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <p class="text-header tiny">المجموع</p>
            <p class="price"><span>$</span>{!! $card::total() !!}</p>
            <a href="cart.html" class="button primary half">الذهاب للسلة</a>
            <a href="checkout.html" class="button secondary half">الذهاب للدفع</a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN CART -->
