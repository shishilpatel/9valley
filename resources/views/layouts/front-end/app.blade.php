<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title') | Yeap®Cart
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">
    <link rel="icon" type="image/png" sizes="32x32"
          href="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext"
          as="style" rel="stylesheet preload" defer>
{{--    <link rel="stylesheet" href="{{asset('public/theme/martfury/plugins/font-awesome/css/font-awesome.min.css')}}">--}}
    <link rel="stylesheet"
          href="{{asset('public/theme/martfury/fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
    <link as="style" rel="stylesheet preload" href="{{asset('public/theme/martfury/plugins/bootstrap/css/bootstrap.min.css')}}">
{{--    <link rel="stylesheet" href="{{asset('public/theme/martfury/plugins/owl-carousel/assets/owl.carousel.min.css')}}">--}}
    <link as="style" rel="stylesheet preload"
          href="{{asset('public/theme/martfury/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link as="style" rel="stylesheet preload" href="{{asset('public/theme/martfury/plugins/slick/slick/slick.css')}}">
{{--    <link rel="stylesheet" href="{{asset('public/theme/martfury/plugins/nouislider/nouislider.min.css')}}">--}}
    <link rel="stylesheet"
          href="{{asset('public/theme/martfury/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link as="style" rel="stylesheet preload"
          href="{{asset('public/theme/martfury/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <script as="script" rel="preload" src="https://kit.fontawesome.com/a84e1ef45e.js" crossorigin="anonymous"></script>
    <link as="style" rel="stylesheet preload" href="{{asset('public/theme/martfury/plugins/select2/dist/css/select2.min.css')}}">
    <link as="style" rel="stylesheet preload" href="{{asset('public/theme/martfury/css/style.css')}}">
{{--    <link rel="stylesheet" href="{{asset('public/theme/martfury/css/market-place-3.css')}}">--}}
    @stack('css_or_js')

    {{--dont touch this--}}
    <meta name="_token" content="{{csrf_token()}}">
    {{--dont touch this--}}
    <!--to make http ajax request to https-->
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->

    @php($google_tag_manager_id = \App\CPU\Helpers::get_business_settings('google_tag_manager_id'))
    @if($google_tag_manager_id )
        <!-- Google Tag Manager -->
        <script defer>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '{{$google_tag_manager_id}}');</script>
        <!-- End Google Tag Manager -->

    @endif

    @php($pixel_analytices_user_code =\App\CPU\Helpers::get_business_settings('pixel_analytics'))
    @if($pixel_analytices_user_code)
        <!-- Facebook Pixel Code -->
        <script defer>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{your-pixel-id-goes-here}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id={your-pixel-id-goes-here}&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endif

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2MCG6TZPEQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-2MCG6TZPEQ');
    </script>
</head>
<!-- Body-->
<body class="toolbar-enabled">
@if($google_tag_manager_id)
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id={{$google_tag_manager_id}}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
<!-- Sign in / sign up modal-->
@include('layouts.front-end.partials._modals')
<!-- Navbar-->
<!-- Quick View Modal-->
@include('layouts.front-end.partials._quick-view-modal')
<!-- Navbar Electronics Store-->
@include('layouts.front-end.partials._header')
<!-- Page title-->

{{--loader--}}
<div class="row">
    <div class="col-12" style="margin-top:10rem;position: fixed;z-index: 9999;">
        <div id="loading" style="display: none;">
            <center>
                <img width="200"
                     src="{{asset('storage/app/public/company')}}/{{\App\CPU\Helpers::get_business_settings('loader_gif')}}"
                     onerror="this.src='{{asset('public/assets/front-end/img/loader.gif')}}'">
            </center>
        </div>
    </div>
</div>
{{--loader--}}

<!-- Page Content-->
@yield('content')

<!-- Footer-->
<!-- Footer-->
@include('layouts.front-end.partials._footer')
<!-- Toolbar for handheld devices-->
{{--<div class="cz-handheld-toolbar" id="toolbar">--}}
{{--    @include('layouts.front-end.partials._toolbar')--}}
{{--</div>--}}

<!-- Back To Top Button-->
<div id="back2top"><i class="icon icon-arrow-up"></i></div>
<!-- Vendor scrits: js libraries and plugins-->

{{--<script src="{{asset('public/assets/front-end')}}/vendor/jquery/dist/jquery.slim.min.js"></script>--}}
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset("public/theme/martfury/plugins/jquery.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/nouislider/nouislider.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/popper.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/owl-carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/imagesloaded.pkgd.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/masonry.pkgd.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/jquery.matchHeight-min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/slick/slick/slick.min.js")}}"></script>
<script as="script" rel="preload"  src="{{asset("public/theme/martfury/plugins/jquery-bar-rating/dist/jquery.barrating.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/slick-animation.min.js")}}"></script>
<script src="{{asset("public/theme/martfury/plugins/lightGallery-master/dist/js/lightgallery-all.min.js")}}"></script>
<script as="script" rel="preload" src="{{asset("public/theme/martfury/plugins/sticky-sidebar/dist/sticky-sidebar.min.js")}}"></script>
<script as="script" rel="preload" src="{{asset("public/theme/martfury/plugins/select2/dist/js/select2.full.min.js")}}"></script>
<script as="script" rel="preload" src="{{asset("public/theme/martfury/plugins/gmap3.min.js")}}"></script>
<!-- custom scripts-->
<script src="{{asset("public/theme/martfury/js/main.js")}}"></script>
{{--Toastr--}}
<script src="{{asset('public/assets/front-end')}}/js/sweet_alert.js"></script>
<script src={{asset("public/assets/back-end/js/toastr.js")}}></script>
{!! Toastr::message() !!}

<script>
    function addWishlist(product_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('store-wishlist')}}",
            method: 'POST',
            data: {
                product_id: product_id
            },
            success: function (data) {
                if (data.value == 1) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.countWishlist').html(data.count);
                    $('.countWishlist-' + product_id).text(data.product_count);
                    $('.tooltip').html('');

                } else if (data.value == 2) {
                    Swal.fire({
                        type: 'info',
                        title: 'WishList',
                        text: data.error
                    });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'WishList',
                        text: data.error
                    });
                }
            }
        });
    }

    function removeWishlist(product_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('delete-wishlist')}}",
            method: 'POST',
            data: {
                id: product_id
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'WishList',
                    text: data.success
                });
                $('.countWishlist').html(data.count);
                $('#set-wish-list').html(data.wishlist);
                $('.tooltip').html('');
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }

    function quickView(product_id) {
        $.get({
            url: '{{route('quick-view')}}',
            dataType: 'json',
            data: {
                product_id: product_id
            },
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (data) {
                console.log("success...")
                $('#quick-view').modal('show');
                $('#quick-view-modal').empty().html(data.view);
            },
            complete: function () {
                $('#loading').hide();
            },
        });
    }

    function addToCart(form_id = 'add-to-cart-form', redirect_to_checkout = false) {
        if (checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: '{{ route('cart.add') }}',
                data: $('#' + form_id).serializeArray(),
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    console.log(response);
                    if (response.status == 1) {
                        updateNavCart();
                        toastr.success(response.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        $('.call-when-done').click();
                        if (redirect_to_checkout) {
                            location.href = "{{route('checkout-details')}}";
                        }
                        return false;
                    } else if (response.status == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Cart',
                            text: response.message
                        });
                        return false;
                    }
                },
                complete: function () {
                    $('#loading').hide();

                }
            });
        } else {
            Swal.fire({
                type: 'info',
                title: 'Cart',
                text: '{{\App\CPU\translate('please_choose_all_the_options')}}'
            });
        }
    }

    function buy_now() {
        addToCart('add-to-cart-form', true);
        /* location.href = "{{route('checkout-details')}}"; */
    }

    function currency_change(currency_code) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{route('currency.change')}}',
            data: {
                currency_code: currency_code
            },
            success: function (data) {
                toastr.success('{{\App\CPU\translate('Currency changed to')}}' + data.name);
                location.reload();
            }
        });
    }

    function removeFromCart(key) {
        $.post('{{ route('cart.remove') }}', {_token: '{{ csrf_token() }}', key: key}, function (response) {
            $('#cod-for-cart').hide();
            updateNavCart();
            $('#cart-summary').empty().html(response.data);
            toastr.info('{{\App\CPU\translate('Item has been removed from cart')}}', {
                CloseButton: true,
                ProgressBar: true
            });
            let segment_array = window.location.pathname.split('/');
            let segment = segment_array[segment_array.length - 1];
            if (segment === 'checkout-payment' || segment === 'checkout-details') {
                location.reload();
            }
        });
    }

    function updateNavCart() {
        $.post('{{route('cart.nav-cart')}}', {_token: '{{csrf_token()}}'}, function (response) {
            $('#cart_items').html(response.data);
        });
    }

    function cartQuantityInitialize() {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            productType = $(this).attr('product-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                console.log(productType)
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max') || (productType === 'digital')) {
                        input.val(currentVal + 1).change();
                    }

                    if ((parseInt(input.val()) == input.attr('max')) && (productType === 'physical')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });

        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });

        $('.input-number').change(function () {
            productType = $(this).attr('product-type');
            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            var name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: '{{\App\CPU\translate('Sorry, the minimum order quantity does not match')}}'
                });
                $(this).val($(this).data('oldValue'));
            }
            if (productType === 'digital' || valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Cart',
                    text: '{{\App\CPU\translate('Sorry, stock limit exceeded')}}.'
                });
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }

    function updateQuantity(key, element) {
        $.post('<?php echo e(route('cart.updateQuantity')); ?>', {
            _token: '<?php echo e(csrf_token()); ?>',
            key: key,
            quantity: element.value
        }, function (data) {
            updateNavCart();
            $('#cart-summary').empty().html(data);
        });
    }

    function updateCartQuantity(minimum_order_qty, key) {
        /* var quantity = $("#cartQuantity" + key).children("option:selected").val(); */
        var quantity = $("#cartQuantity" + key).val();
        if (minimum_order_qty > quantity) {
            toastr.error('{{\App\CPU\translate("minimum_order_quantity_cannot_be_less_than_")}}' + minimum_order_qty);
            $("#cartQuantity" + key).val(minimum_order_qty);
            return false;
        }

        $.post('{{route('cart.updateQuantity')}}', {
            _token: '{{csrf_token()}}',
            key: key,
            quantity: quantity
        }, function (response) {
            if (response.status == 0) {
                toastr.error(response.message, {
                    CloseButton: true,
                    ProgressBar: true
                });
                $("#cartQuantity" + key).val(response['qty']);
            } else {
                updateNavCart();
                $('#cart-summary').empty().html(response);
            }
        });
    }

    $('#add-to-cart-form input').on('change', function () {
        getVariantPrice();
    });

    function getVariantPrice() {
        if ($('#add-to-cart-form input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route('cart.variant_price') }}',
                data: $('#add-to-cart-form').serializeArray(),
                success: function (data) {
                    console.log(data)
                    $('#add-to-cart-form #chosen_price_div').removeClass('d-none');
                    $('#add-to-cart-form #chosen_price_div #chosen_price').html(data.price);
                    $('#set-tax-amount').html(data.tax);
                    $('#set-discount-amount').html(data.discount);
                    $('#available-quantity').html(data.quantity);
                    $('.cart-qty-field').attr('max', data.quantity);
                }
            });
        }
    }

    function checkAddToCartValidity() {
        var names = {};
        $('#add-to-cart-form input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });
        if ($('input:radio:checked').length == count) {
            return true;
        }
        return false;
    }

    @if(Request::is('/') &&  \Illuminate\Support\Facades\Cookie::has('popup_banner')==false)
    $(document).ready(function () {
        $('#popup-modal').appendTo("body").modal('show');
    });
    @php(\Illuminate\Support\Facades\Cookie::queue('popup_banner', 'off', 1))
    @endif

    $(".clickable").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });
</script>

@if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif

<script>
    function couponCode() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '{{ route('coupon.apply') }}',
            data: $('#coupon-code-ajax').serializeArray(),
            success: function (data) {
                /* console.log(data);
                return false; */
                if (data.status == 1) {
                    let ms = data.messages;
                    ms.forEach(
                        function (m, index) {
                            toastr.success(m, index, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    );
                } else {
                    let ms = data.messages;
                    ms.forEach(
                        function (m, index) {
                            toastr.error(m, index, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    );
                }
                setInterval(function () {
                    location.reload();
                }, 2000);
            }
        });
    }

    jQuery(".search-bar-input").keyup(function () {
        $(".ps-panel--search-result").css("display", "block");
        $(".ps-panel--search-result").addClass("active");
        let name = $(".search-bar-input").val();
        if (name.length > 0) {
            $.get({
                url: '{{url('/')}}/searched-products',
                dataType: 'json',
                data: {
                    name: name
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('.search-result-box').empty().html(data.result)
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        } else {
            $('.search-result-box').empty();
        }
    });

    jQuery(".search-bar-input-mobile").keyup(function () {
        $(".search-card").css("display", "block");
        let name = $(".search-bar-input-mobile").val();
        if (name.length > 0) {
            $.get({
                url: '{{url('/')}}/searched-products',
                dataType: 'json',
                data: {
                    name: name
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('.search-result-box').empty().html(data.result)
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        } else {
            $('.search-result-box').empty();
        }
    });

    jQuery(document).mouseup(function (e) {
        var container = $(".search-card");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });

    const img = document.getElementByTagName("img")
    img.addEventListener("error", function (event) {
        event.target.src = '{{asset('public/assets/front-end/img/image-place-holder.png')}}';
        event.onerror = null
    })

    function route_alert(route, message) {
        Swal.fire({
            title: '{{\App\CPU\translate('Are you sure')}}?',
            text: message,
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '{{$web_config['primary_color']}}',
            cancelButtonText: '{{\App\CPU\translate('No')}}',
            confirmButtonText: '{{\App\CPU\translate('Yes')}}',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                location.href = route;
            }
        })
    }
</script>

@stack('script')

</body>
</html>
