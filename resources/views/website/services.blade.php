
<!-- SERVICES -->
<div id="services-wrap">
        <section id="services" class="services-v2">
            <!-- SERVICE LIST -->
            <div class="service-list small column3-wrap">

                @forelse ($webservices as $item => $val)
                    <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <span class="{!! $val->icon !!}"></span>
                        </div>
                        <h3>{!! $val->title !!}</h3>
                        <p>{!! $val->body !!}</p>
                    </div>
                    <!-- /SERVICE ITEM -->    
                @empty
                    
                @endforelse
                
    

            </div>
            <!-- /SERVICE LIST -->
            <div class="clearfix"></div>
        </section>
    </div>
    <!-- /SERVICES -->