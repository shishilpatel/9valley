<!-- Footer -->
<style>
    .social-media :hover {
        color: {{$web_config['secondary_color']}}         !important;
    }

    .ps-block--site-features .ps-block__left, .ps-block--site-features .ps-block__right {
        width: 100%;
    }

    .ps-block--site-features .ps-block__item {
        text-align: center;
    }

    .widget-list-link {
        color: #000 !important;
    }

    .widget-list-link:hover {
        color: #999898 !important;
    }

    .subscribe-border {
        border-radius: 5px;
    }

    .subscribe-button {
        background: #000;
        position: absolute;
        top: 0;
        color: white;
        padding: 11px;
        padding-left: 15px;
        padding-right: 15px;
        text-transform: capitalize;
        border: none;
    }

    .start_address {
        display: flex;
        justify-content: space-between;
    }

    .start_address_under_line {
    {{Session::get('direction') === "rtl" ? 'width: 344px;' : 'width: 331px;'}}








    }

    .address_under_line {
        width: 299px;
    }

    .end-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media only screen and (max-width: 500px) {
        .start_address {
            display: block;
        }

        .footer-web-logo {
            justify-content: center !important;
            padding-bottom: 25px;
        }

        .footer-padding-bottom {
            padding-bottom: 15px;
        }

        .mobile-view-center-align {
            justify-content: center !important;
            padding-bottom: 15px;
        }

        .last-footer-content-align {
            display: flex !important;
            justify-content: center !important;
            padding-bottom: 10px;
        }
    }

    @media only screen and (max-width: 800px) {
        .end-footer {

            display: block;

            align-items: center;
        }
    }

    @media only screen and (max-width: 1200px) {
        .start_address_under_line {
            display: none;
        }

        .address_under_line {
            display: none;
        }
    }
</style>

<footer class="ps-footer ps-footer--3">
    <div>
        <div class="ps-site-features">
            <div class="">
                <div class="ps-block--site-features">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right"><h4>Free Delivery</h4>
                            <p>For all orders over $99</p></div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right"><h4>15 Days Return</h4>
                            <p>If goods have problems</p></div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                        <div class="ps-block__right"><h4>Secure Payment</h4>
                            <p>100% secure payment</p></div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                        <div class="ps-block__right"><h4>24/7 Support</h4>
                            <p>Dedicated support</p></div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-gift"></i></div>
                        <div class="ps-block__right"><h4>Gift Service</h4>
                            <p>Support gift service</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-download-app">
        <div class="ps-container">
            <div class="ps-block--download-app">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block__thumbnail"><img src="" alt=""></div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block__content">
                                <h3>Download YeapCart App Now!</h3>
                                <p>Shopping fastly and easily more with our app. Get a link to download the app on your
                                    phone
                                    Shop Most prominent Product from all over the India, with just few taps
                                </p>
                                <form class="ps-form--download-app"
                                      action="{{ route('subscription') }}" method="post">
                                    @csrf
                                    <div class="form-group--nest">
                                        <input class="form-control" type="email" name="subscription_email"
                                               placeholder="Email Address">
                                        <button class="ps-btn">{{\App\CPU\translate('subscribe')}}</button>
                                    </div>
                                </form>
                                <p class="download-link"><a href="#">
                                        <img src="img/google-play.png" alt=""></a>
                                    <a href="#"><img src="img/app-store.png" alt=""></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-container">

        <div class="ps-footer__widgets">
            <aside class="widget widget_footer widget_contact-us">
                <h4 class="widget-title">Contact us</h4>
                <div class="widget_content">
                    <p>Call us 24/7</p>
                    <h3>{{$web_config['phone']->value}}</h3>
                    <p>{{ \App\CPU\Helpers::get_business_settings('shop_address')}} <br><a
                            href="mailto:info@yeapcart.com"><span
                                class="__cf_email__" data-cfemail="0c6f6362786d6f784c616d7e786a797e75226f63">info@YeapCart.com</span></a>
                    </p>
                    <ul class="ps-list--social">
                        @php($social_media = \App\Model\SocialMedia::where('active_status', 1)->get())
                        @if(isset($social_media))
                            @foreach ($social_media as $item)
                                <li>
                                    <a class="{{$item->name}} {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} mb-2"
                                       target="_blank" href="{{$item->link}}"
                                       style="color: {{ ($item->name == 'linkedin') ? '#0072b1' : '' }}!important;">
                                        <i class="{{$item->icon}}" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Quick links</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('privacy-policy')}}">Privacy & Policy</a></li>
                    <li><a href="{{route('terms')}}">Term & Condition</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="{{route('refund-return')}}">Return & Refund Policy</a></li>
                    <li><a href="{{route('helpTopic')}}">FAQs</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Company</h4>
                <ul class="ps-list--link">
                    <li><a href="{{route('about-us')}}">About Us</a></li>
{{--                    <li><a href="#">Affilate</a></li>--}}
{{--                    <li><a href="#">Career</a></li>--}}
                    <li><a href="{{route('contacts')}}">Contact</a></li>
                </ul>
            </aside>
            <aside class="widget widget_footer">
                <h4 class="widget-title">Bussiness</h4>
                <ul class="ps-list--link">
                    <li><a href="#">Our Press</a></li>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </aside>
        </div>
        <div class="ps-footer__links">
            @php($categories=\App\Model\Category::with(['childes.childes'])->where('position', 0)->priority()->paginate(11))
            @foreach($categories as $key=>$category)
                <p>
                    <strong>{{$category['name']}}:</strong>
                    @if ($category->childes->count() > 0)
                        @foreach($category['childes'] as $subCategory)
                            <a href="{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subCategory['name']}}</a>
                        @endforeach
                    @else
                        <a href="{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}">{{$category['name']}}</a>
                    @endif

                </p>
            @endforeach

        </div>
        <div class="ps-footer__copyright">
            <p>{{ $web_config['copyright_text']->value }} All Rights Reserved</p>
            <p>
                <span>We Using Safe Payment For:</span>
                <a href="#"><i class="fa-brands fa-cc-stripe fa-2x"></i></a>
                <a href="#"><i class="fa-brands fa-cc-mastercard fa-2x"></i></a>
                <a href="#"><i class="fa-brands fa-cc-visa fa-2x"></i></a>
                <a href="#"><i class="fa-brands fa-cc-paypal fa-2x"></i></a>
            </p>
        </div>
    </div>
</footer>


<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="https://nouthemes.net/html/martfury/do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                <div class="ps-product__header">
                    <div class="ps-product__thumbnail" data-vertical="false">
                        <div class="ps-product__images" data-arrow="true">
                            <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                            <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                            <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                        </div>
                    </div>
                    <div class="ps-product__info">
                        <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                        <div class="ps-product__meta">
                            <p>Brand:<a href="shop-default.html">Sony</a></p>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select><span>(1 review)</span>
                            </div>
                        </div>
                        <h4 class="ps-product__price">$36.78 – $56.99</h4>
                        <div class="ps-product__desc">
                            <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                            <ul class="ps-list--dot">
                                <li> Unrestrained and portable active stereo speaker</li>
                                <li> Free from the confines of wires and chords</li>
                                <li> 20 hours of portable capabilities</li>
                                <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                            </ul>
                        </div>
                        <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a
                                class="ps-btn" href="#">Buy Now</a>
                            <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i
                                        class="icon-chart-bars"></i></a></div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

