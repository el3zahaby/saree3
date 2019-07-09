
@forelse (getparentmenu() as $item => $val)
    @if($val->url == null)
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon {{$val->icon}} tx-20"></i>
            <span class="menu-item-label">{{__($val->title)}}</span>
            </a>
            <ul class="br-menu-sub">
                @forelse(getsubmenu($val->id) as $i => $v)
                    <li class="sub-item"><a data-pjax href="{{ route($v->url) }}" class="sub-link">{{__($v->title)}}</a></li>
                @empty

                @endempty
            </ul>
        </li>

    @else
    <li class="br-menu-item">
        <a data-pjax href="{{ route($val->url) }}" class="br-menu-link">
            <i class="menu-item-icon icon {{$val->icon}} tx-24"></i>
            <span class="menu-item-label">{{__($val->title)}}</span>
        </a>
    </li>    

    @endif
@empty

@endempty



<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.orders.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Orders')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.sections.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Sections')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.services.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Services')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.threads.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-chatboxes-outline tx-24"></i>
        <span class="menu-item-label">@lang('Threads')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.threadSection.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-chatboxes-outline tx-24"></i>
        <span class="menu-item-label">أقسام المجتمع</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.products.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-cart-outline tx-24"></i>
        <span class="menu-item-label">@lang('Products')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.users.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-people-outline tx-24"></i>
        <span class="menu-item-label">@lang('Users')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.withdraws.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Withdraws')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.newsletters.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Newsletters')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.advertisements.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Advertisements')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.deposits.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Deposits')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.settings') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">@lang('Settings')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.logs') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">@lang('Logs')</span>
    </a>
</li>


<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.comments.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Comments')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.photos.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Photos')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.areas.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Areas')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.addresses.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Addresses')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.plans.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Plans')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.subscriptions.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Subscriptions')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.branches.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Branches')</span>
    </a>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.industries.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">@lang('Industries')</span>
    </a>
</li>
<li class="br-menu-item">
        <a data-pjax href="{{ route('backend.menu.index') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-star tx-24"></i>
            <span class="menu-item-label">{{__('Tri Menu')}}</span>
        </a>
    </li>
<li class="br-menu-item">
    <a data-pjax href="#" class="br-menu-link">
        <i class="menu-item-icon icon ion-star tx-24"></i>
        <span class="menu-item-label">{{__('Rating')}}</span>
    </a>
</li>
<li class="br-menu-item">
        <a data-pjax href="{{ route('backend.servicewebsite.index') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-help tx-24"></i>
            <span class="menu-item-label">{{__('مميزات الموقع')}}</span>
        </a>
    </li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.currencies.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-folder-outline tx-24"></i>
        <span class="menu-item-label">العملات</span>
    </a>
</li>
<li class="br-menu-item">
    <a href="#" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">التحكم بالمحتوى</span>
    </a>
    <ul class="br-menu-sub">
        <li class="sub-item"><a data-pjax href="{{ route('backend.sliders.index') }}" class="sub-link">سليدرات</a></li>
        <li class="sub-item"><a data-pjax href="{{ route('backend.positionsliders.index') }}" class="sub-link">أماكن السليدرات</a></li>
        <li class="sub-item"><a data-pjax href="{{ route('backend.homecomponent.index') }}" class="sub-link">خدمات الموقع</a></li>
    </ul>
</li>
<li class="br-menu-item">
    <a data-pjax href="{{ route('backend.paymentmethods.index') }}" class="br-menu-link">
        <i class="menu-item-icon icon ion-card tx-24"></i>
        <span class="menu-item-label">طرق الدفع</span>
    </a>
</li>
