@foreach($products as $i)

    <div class="ps-product ps-product--wide ps-product--search-result">
        <div class="ps-product__thumbnail">
            <a href="product-default.html">
                <img
                    src="{{asset("storage/app/public/product/")}}/{{$i['thumbnail']}}" alt=""/>
            </a>
        </div>
        <div class="ps-product__content">
            <a class="ps-product__title" onmouseover="$('.search-bar-input-mobile').val('{{$i['name']}}');$('.search-bar-input').val('{{$i['name']}}');" onclick="$('.search_form').submit()">{{$i['name']}}</a>
            <div class="ps-product__rating">
                <select class="ps-rating" data-read-only="true">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                </select><span></span>
            </div>
            <p class="ps-product__price">{{\App\CPU\Helpers::currency_converter($i['unit_price'])}}</p>
        </div>
    </div>
@endforeach
