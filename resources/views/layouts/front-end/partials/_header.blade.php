<style>
    .card-body.search-result-box {
        overflow: scroll;
        height: 400px;
        overflow-x: hidden;
    }

    .active .seller {
        font-weight: 700;
    }

    .for-count-value {
        position: absolute;

        right: 0.6875rem;;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{$web_config['primary_color']}};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    .count-value {
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        color: {{$web_config['primary_color']}};

        font-size: .75rem;
        font-weight: 500;
        text-align: center;
        line-height: 1.25rem;
    }

    @media (min-width: 992px) {
        .navbar-sticky.navbar-stuck .navbar-stuck-menu.show {
            display: block;
            height: 55px !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-stuck-menu {
            background-color: {{$web_config['primary_color']}};
            line-height: 15px;
            padding-bottom: 6px;
        }

    }

    @media (max-width: 767px) {
        .search_button {
            background-color: transparent !important;
        }

        .search_button .input-group-text i {
            color: {{$web_config['primary_color']}}                                                      !important;
        }

        .navbar-expand-md .dropdown-menu > .dropdown > .dropdown-toggle {
            position: relative;
            padding- {{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 1.95rem;
        }

        .mega-nav1 {
            background: white;
            color: {{$web_config['primary_color']}}                                                      !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}                                                      !important;
        }
    }

    @media (max-width: 768px) {
        .tab-logo {
            width: 10rem;
        }
    }

    @media (max-width: 360px) {
        .mobile-head {
            padding: 3px;
        }
    }

    @media (max-width: 471px) {
        .navbar-brand img {

        }

        .mega-nav1 {
            background: white;
            color: {{$web_config['primary_color']}}                                                      !important;
            border-radius: 3px;
        }

        .mega-nav1 .nav-link {
            color: {{$web_config['primary_color']}}                         !important;
        }
    }

    #anouncement {
        width: 100%;
        padding: 2px 0;
        text-align: center;
        color: white;
    }
</style>
@php($announcement=\App\CPU\Helpers::get_business_settings('announcement'))
@if (isset($announcement) && $announcement['status']==1)
    <div class="d-flex justify-content-between align-items-center" id="anouncement"
         style="background-color: {{ $announcement['color'] }};color:{{$announcement['text_color']}}">
        <span></span>
        <span style="text-align:center; font-size: 15px;">{{ $announcement['announcement'] }} </span>
        <span class="ml-3 mr-3" style="font-size: 12px;cursor: pointer;color: darkred" onclick="myFunction()">X</span>
    </div>
@endif

<header class="header header--market-place-3" data-sticky="true">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            @php($categories=\App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11))
                            @foreach($categories as $key=>$category)
                                @if ($category->childes->count() > 0)
                                    <li class="menu-item-has-children has-mega-menu">
                                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">
                                            <i class="{{$category['fa_icon']}} fa-2x"></i> {{$category['name']}}
                                        </a>
                                        <div class="mega-menu">

                                            <div class="mega-menu__column">
                                                <ul class="mega-menu__list">
                                                    @foreach($category['childes'] as $subCategory)
                                                        <li>
                                                            <a href="{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subCategory['name']}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                @else
                                    <li>
                                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}"><i
                                                class="{{$category['fa_icon']}} fa-2x"></i> {{$category['name']}}</a>
                                    </li>

                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <a class="ps-logo" href="/">
                    <img style="width: 50%"
                         src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                         onerror="this.src='{{asset('public/theme/martfury/img/Yeapcart.png')}}'"
                         alt="{{$web_config['name']->value}} | YeapCart "></a>
            </div>
            <div class="header__center">
                <form class="ps-form--quick-search search_form" action="{{route('products')}}"
                      method="get">
                    {{--                    <div class="form-group--icon"><i class="icon-chevron-down"></i>--}}
                    {{--                        <select class="form-control">--}}
                    {{--                            <option value="1">All</option>--}}
                    {{--                            <option value="1">Bags</option>--}}
                    {{--                            <option value="1">Shoes</option>--}}
                    {{--                            <option value="1">Men</option>--}}
                    {{--                            <option value="1">Women</option>--}}
                    {{--                            <option value="1">Sunglasses</option>--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <input class="form-control appended-form-control search-bar-input" type="text" name="name"
                           placeholder="I'm shopping for...">
                    <input name="data_from" value="search" hidden>
                    <input name="page" value="1" hidden>
                    <button>Search</button>
                    <div class="ps-panel--search-result">
                        <div class="ps-panel__content search-result-box"></div>
                    </div>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions">
                    <a class="header__extra" href="#    ">

                        <i class="icon-chart-bars"></i>
                        <span><i>0</i></span>
                    </a>
                    <a class="header__extra" href="{{route('wishlists')}}">
                        <i class="icon-heart"></i>
                        <span><i>{{session()->has('wish_list')?count(session('wish_list')):0}}</i></span>
                    </a>
                    @php($cart=\App\CPU\CartManager::get_cart())

                    <div class="ps-cart--mini">
                        <a class="header__extra" href="{{route('shop-cart')}}">
                            <i class="icon-bag2"></i>
                            <span><i>{{$cart->count()}}</i></span>
                        </a>
                        @if($cart->count() > 0)
                            <div class="ps-cart__content">
                                <div class="ps-cart__items">
                                    @php($sub_total=0)
                                    @php($total_tax=0)
                                    @foreach($cart as  $cartItem)
                                        <div class="ps-product--cart-mobile">
                                            <div class="ps-product__thumbnail"><a
                                                    href="{{route('product',$cartItem['slug'])}}"><img
                                                        onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                        src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                                        alt=""></a></div>
                                            <div class="ps-product__content">
                                                <a class="ps-product__remove" href="#"
                                                   onclick="removeFromCart({{ $cartItem['id'] }})">
                                                    <i class="icon-cross"></i>
                                                </a>
                                                <a href="{{route('product',$cartItem['slug'])}}">{{Str::limit($cartItem['name'],30)}}</a>
                                                @foreach(json_decode($cartItem['variations'],true) as $key =>$variation)
                                                    <span style="font-size: 14px">{{$key}} : {{$variation}}</span><br>
                                                @endforeach
                                                <div class="widget-product-meta">
                                                    <span
                                                        class="text-muted {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">x {{$cartItem['quantity']}}</span>
                                                    <span
                                                        class="text-accent {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">
                                                        {{\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])}}
                                                     </span>
                                                </div>

                                            </div>
                                        </div>

                                        @php($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])
                                        @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                                    @endforeach
                                </div>
                                <div class="ps-cart__footer">
                                    <h3>Sub Total:<strong>{{\App\CPU\Helpers::currency_converter($sub_total)}}</strong>
                                    </h3>
                                    <figure>
                                        <a class="ps-btn" href="{{route('shop-cart')}}">View Cart</a>
                                        <a class="ps-btn" href="{{route('checkout-details')}}">Checkout</a>
                                    </figure>
                                </div>
                            </div>
                        @else
                            <div class="ps-cart__content">
                                <div class="ps-cart__items">

                                    <div class="ps-product--cart-mobile">
                                        No products in the cart.
                                    </div>

                                </div>
                            </div>
                        @endif


                    </div>

                    <div class="ps-block--user-header">
                        @if(auth('customer')->check())
                            <div class="ps-block__left"><i class="icon-user"></i></div>
                            <div class="ps-block__right"><a
                                    href="{{route('user-account')}}">{{\App\CPU\translate('hello')}}
                                    , {{auth('customer')->user()->f_name}}</a><a
                                    href="{{route('customer.auth.logout')}}">{{ \App\CPU\translate('logout')}}</a>
                            </div>
                        @else
                            <div class="ps-block__left"><i class="icon-user"></i></div>
                            <div class="ps-block__right"><a href="{{route('customer.auth.login')}}">Login</a><a
                                    href="{{route('customer.auth.sign-up')}}">Register</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="ps-container">
            <div class="navigation__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle active"><i class="icon-menu"></i><span> Shop by Department</span></div>
                    <div class="menu__content"></div>
                </div>
            </div>
            <div class="navigation__right">
                <ul class="menu menu--recent-view">
                    <li class="menu-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Your Recently Viewed</a>
                        {{--                        <div class="navigation__recent-products">--}}
                        {{--                            <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true"--}}
                        {{--                                 data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false"--}}
                        {{--                                 data-owl-item="8" data-owl-item-xs="3" data-owl-item-sm="4" data-owl-item-md="5"--}}
                        {{--                                 data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="on"><a href="#"><img--}}
                        {{--                                        src="img/products/technology/1.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/2.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/3.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/4.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/5.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/6.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/7.jpg" alt=""></a><a href="#"><img--}}
                        {{--                                        src="img/products/technology/8.jpg" alt=""></a></div>--}}
                        {{--                            <p><a href="shop-default.html">See all your recently viewed items</a></p>--}}
                        {{--                        </div>--}}
                    </li>
                </ul>
                <ul class="navigation__extra">
                    @php($business_mode=\App\CPU\Helpers::get_business_settings('business_mode'))
                    @if ($business_mode == 'multi')
                        @php($seller_registration=\App\Model\BusinessSetting::where(['type'=>'seller_registration'])->first()->value)
                        @if($seller_registration)
                            <li><a href="{{route('shop.apply')}}">Sell on YeapCart</a></li>
                        @endif
                    @endif
                    <li><a href="https://yeapcart.pickrr.com">Track your order</a></li>
                    @php($currency_model = \App\CPU\Helpers::get_business_settings('currency_model'))
                    @if($currency_model=='multi_currency')
                        <li>
                            <div class="ps-dropdown">
                                <a href="#">{{session('currency_code')}} {{session('currency_symbol')}}</a>
                                <ul class="ps-dropdown-menu">
                                    @foreach (\App\Model\Currency::where('status', 1)->get() as $key => $currency)
                                        <li style="cursor: pointer;padding: 6px"
                                            onclick="currency_change('{{$currency['code']}}')">
                                            {{ $currency->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li>
                        @php( $local = \App\CPU\Helpers::default_lang())
                        <div class="ps-dropdown language">
                            <a href="#"><img src="{{asset("public/theme/martfury/img/flag/en.png")}}" alt="">English</a>
                            <ul class="ps-dropdown-menu">
                                @foreach(json_decode($language['value'],true) as $key =>$data)
                                    @if($data['status']==1)
                                        <li>
                                            <a class="dropdown-item pb-1" href="{{route('lang',[$data['code']])}}">
                                                <img class="{{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"
                                                     width="20"
                                                     src="{{asset("public/theme/martfury/img/flag")}}/{{$data['code']}}.png"
                                                     alt="{{$data['name']}}"/>
                                                <span style="text-transform: capitalize">{{$data['name']}}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="header__top">
        <div class="header__left">
            <p>Welcome to YeapCart Online Shopping Store !</p>
        </div>
        <div class="header__right">
            <ul class="navigation__extra">
                <li><a href="#">Sell on YeapCart</a></li>
                <li><a href="https://yeapcart.pickrr.com">Tract your order</a></li>
                <li>
                    <div class="ps-dropdown"><a href="#">US Dollar</a>
                        <ul class="ps-dropdown-menu">
                            <li><a href="#">Us Dollar</a></li>
                            <li><a href="#">Euro</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="ps-dropdown language"><a href="#"><img src="img/flag/en.png" alt="">English</a>
                        <ul class="ps-dropdown-menu">
                            <li><a href="#"><img src="img/flag/germany.png" alt=""> Germany</a></li>
                            <li><a href="#"><img src="img/flag/fr.png" alt=""> France</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo" href="/">
                <img style="width: 44%" src="{{asset("storage/app/public/company")."/".$web_config['web_logo']->value}}"
                     onerror="this.src='{{asset('public/theme/martfury/img/Yeapcart.png')}}'"
                     alt="{{$web_config['name']->value}} | YeapCart" alt="">
            </a>
        </div>
        <div class="navigation__right">
            <div class="header__actions">
                @php($cart=\App\CPU\CartManager::get_cart())
                <div class="ps-cart--mini">
                    <a class="header__extra" href="#">
                        <i class="icon-bag2"></i><span><i>{{$cart->count()}}</i></span>
                    </a>
                    @if($cart->count() > 0)
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                @php($sub_total=0)
                                @php($total_tax=0)
                                @foreach($cart as  $cartItem)
                                    <div class="ps-product--cart-mobile">
                                        <div class="ps-product__thumbnail"><a
                                                href="{{route('product',$cartItem['slug'])}}"><img
                                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                                    src="{{\App\CPU\ProductManager::product_image_path('thumbnail')}}/{{$cartItem['thumbnail']}}"
                                                    alt=""></a></div>
                                        <div class="ps-product__content">
                                            <a class="ps-product__remove" href="#"
                                               onclick="removeFromCart({{ $cartItem['id'] }})">
                                                <i class="icon-cross"></i>
                                            </a>
                                            <a href="{{route('product',$cartItem['slug'])}}">{{Str::limit($cartItem['name'],30)}}</a>
                                            @foreach(json_decode($cartItem['variations'],true) as $key =>$variation)
                                                <span style="font-size: 14px">{{$key}} : {{$variation}}</span><br>
                                            @endforeach
                                            <div class="widget-product-meta">
                                                    <span
                                                        class="text-muted {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">x {{$cartItem['quantity']}}</span>
                                                <span
                                                    class="text-accent {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}">
                                                        {{\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])}}
                                                     </span>
                                            </div>

                                        </div>
                                    </div>

                                    @php($sub_total+=($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])
                                    @php($total_tax+=$cartItem['tax']*$cartItem['quantity'])
                                @endforeach
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>{{\App\CPU\Helpers::currency_converter($sub_total)}}</strong>
                                </h3>
                                <figure>
                                    <a class="ps-btn" href="{{route('shop-cart')}}">View Cart</a>
                                    <a class="ps-btn" href="{{route('checkout-details')}}">Checkout</a>
                                </figure>
                            </div>
                        </div>
                    @else
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">

                                <div class="ps-product--cart-mobile">
                                    No products in the cart.
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
                <div class="ps-block--user-header">
                    <div class="ps-block__left"><i class="icon-user"></i></div>
                    <div class="ps-block__right"><a href="my-account.html">Login</a><a
                            href="my-account.html">Register</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile search_form" action="{{route('products')}}" method="get">
            <div class="form-group--nest">
                <input class="form-control search-bar-input-mobile" type="text" placeholder="Search something...">
                <button class="search_button"><i class="icon-magnifier"></i></button>
                <input name="data_from" value="search" hidden>
                <input name="page" value="1" hidden>
                <diV class="card search-card"
                     style="position: absolute;background: white;z-index: 999;width: 100%;display: none; top: 127px;left: 0;">
                    <div class="card-body search-result-box" id=""
                         style="overflow:scroll; height:400px;overflow-x: hidden"></div>
                </diV>
            </div>
        </form>
    </div>
</header>
<div class="ps-panel--sidebar" id="cart-mobile">
    <div class="ps-panel__header">
        <h3>Shopping Cart</h3>
    </div>
    <div class="navigation__content">
        @if($cart->count() > 0)
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="#">
                                <img src="img/products/clothing/7.jpg" alt=""></a>
                        </div>
                        <div class="ps-product__content">
                            <a class="ps-product__remove" href="#">
                                <i class="icon-cross"></i></a>
                            <a href="{{route('product',$cartItem['slug'])}}">{{Str::limit($cartItem['name'],30)}}</a>
                            @foreach(json_decode($cartItem['variations'],true) as $key =>$variation)
                                <span style="font-size: 14px">{{$key}} : {{$variation}}</span><br>
                            @endforeach
{{--                            <p><strong>Sold by:</strong> YOUNG SHOP</p>--}}
                            <small>{{$cartItem['quantity']}} x {{\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])}}</small>
                        </div>
                    </div>
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>{{\App\CPU\Helpers::currency_converter($sub_total)}}</strong></h3>
                    <figure>
                        <a class="ps-btn" href="shopping-cart.html">View Cart</a>
                        <a class="ps-btn" href="checkout.html">Checkout</a>
                    </figure>
                </div>
            </div>
        @else
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    <div class="ps-cart__items">
                        <div class="ps-product--cart-mobile">
                            No products in the cart.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categories</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            @php($categories=\App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11))
            @foreach($categories as $key=>$category)

                @if ($category->childes->count() > 0)
                    <li class="menu-item-has-children has-mega-menu">
                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{$category['name']}}</a>
                        <span class="sub-toggle"></span>
                        @foreach($category['childes'] as $subCategory)
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <a href="{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subCategory['name']}}</a>
                                </div>
                            </div>
                        @endforeach
                    </li>
                @else
                    <li>
                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{$category['name']}}</a>
                    </li>

                @endif
            @endforeach

            {{--            <li class="menu-item-has-children has-mega-menu">--}}
            {{--                <a href="#">Consumer Electronic</a>--}}
            {{--                <span class="sub-toggle"></span>--}}
            {{--                <div class="mega-menu">--}}
            {{--                    <div class="mega-menu__column">--}}
            {{--                        <h4>Electronic<span class="sub-toggle"></span></h4>--}}
            {{--                        <ul class="mega-menu__list">--}}
            {{--                            <li><a href="#">Home Audio &amp; Theathers</a>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                    <div class="mega-menu__column">--}}
            {{--                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>--}}
            {{--                        <ul class="mega-menu__list">--}}
            {{--                            <li><a href="#">Digital Cables</a>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </li>--}}

        </ul>
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content">
        <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i
                class="icon-menu"></i><span> Menu</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i
                class="icon-list4"></i><span> Categories</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i
                class="icon-magnifier"></i><span> Search</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i
                class="fa-solid fa-cart-shopping"></i><span> Cart</span></a>
    </div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="#" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something...">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    <div class="navigation__content"></div>
</div>
<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">
            <li class="menu-item"><a href="{{route('about-us')}}">About Us</a></li>
            <li class="menu-item"><a href="{{route('contacts')}}">Contact</a></li>
            <li class="menu-item"><a href="#">Blogs</a></li>
            <li class="menu-item"><a href="{{route('privacy-policy')}}">Privacy & Policy</a></li>
            <li class="menu-item"><a href="{{route('terms')}}">Term & Condition</a></li>
            <li class="menu-item"><a href="#">Shipping Policy</a></li>
            <li class="menu-item"><a href="#">Return Policy</a></li>
            <li class="menu-item"><a href="{{route('helpTopic')}}">FAQs</a></li>

        </ul>
    </div>
</div>


<script>
    function myFunction() {
        $('#anouncement').addClass('d-none').removeClass('d-flex')
    }
</script>
