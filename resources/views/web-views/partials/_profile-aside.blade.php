<div class="ps-section__left">
    <aside class="ps-widget--account-dashboard">
        <div class="ps-widget__header"><img src="img/users/3.jpg" alt="">
            <figure>
                <figcaption>
                    Hello {{auth('customer')->user()->f_name . " ". auth('customer')->user()->l_name}}</figcaption>
                <p><a href="#"><span class="__cf_email__"
                                     data-cfemail="81f4f2e4f3efe0ece4c1e6ece0e8edafe2eeec">{{auth('customer')->user()->email}}</span></a>
                </p>
            </figure>
        </div>
        <div class="ps-widget__content">
            <ul>
                <li class="{{Request::is('user-account*')?'active':''}}">
                    <a href="{{route('user-account')}}"><i class="icon-user"></i> Account Information</a>
                </li>
                @php
                    $wallet_status = App\CPU\Helpers::get_business_settings('wallet_status');
                    $loyalty_point_status = App\CPU\Helpers::get_business_settings('loyalty_point_status');
                @endphp
                @if ($wallet_status == 1)
                    <li class="{{Request::is('wallet')?'active':''}}"><a href="{{route('wallet') }}"><i
                                class="icon-wallet"></i> My Wallet</a></li>
                @endif
                <li class="{{Request::is('account-oder*') || Request::is('account-order-details*') ? 'active' :''}}"><a
                        href="{{route('account-oder') }}"><i class="icon-papers"></i> My Orders</a></li>
                <li class="{{Request::is('account-address*')?'active':''}}">
                    <a href="{{ route('account-address') }}"><i class="icon-map-marker"></i> Address</a>
                </li>
                @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                @if ($business_mode == 'multi')
                    <li class="{{Request::is('chat*')?'active-menu':''}}"><a href="{{route('chat-with-seller')}}"><i
                                class="icon-bubble"></i> Chat With Seller</a></li>
                @endif
                <li class="{{Request::is('track-order*')?'active':''}}">
                    <a href="{{route('track-order.index') }}"><i class="icon-store"></i> Track order</a>
                </li>
                <li class="{{(Request::is('account-ticket*') || Request::is('support-ticket*'))?'active':''}}">
                    <a href="{{ route('account-tickets') }}"><i class="icon-store"></i> Support Ticket</a>
                </li>
                <li class="{{Request::is('wishlists*')?'active':''}}">
                    <a href="{{route('wishlists')}}"><i class="icon-heart"></i> Wishlist</a>
                </li>
                <li><a href="{{route('customer.auth.logout')}}"><i class="icon-power-switch"></i>Logout</a></li>
            </ul>
        </div>
    </aside>
</div>
