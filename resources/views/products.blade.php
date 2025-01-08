@include('\shop-layout\header')


<h1>КОНТЕНТ Товары</h1>
@if(session()->has('Exception'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Внимание!</strong> {{ session()->get('Exception') }}
            <a href="/loginPage">Войти в личный кабинет</a>
        </div>
@endif
@if(session()->has('Succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Внимание!</strong> {{ session()->get('Succes') }}
            <a href="/cart">Оформить заказ</a>
        </div>
@endif
@if(session()->has('Error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Внимание!</strong> {{ session()->get('Error') }}
            <a href="/support">Написать в поддержку</a>
        </div>
@endif
<!--TODO
    1.выписать характеристики товаров
    2. Создать сущность товар в Models
    3. Создать Seeder на товары
    4. настроить отрисовку в цикле

    в целом работаает
-->



<div class="recommendations-page">
    <div data-tag="row1" class="small-cards-row">
        @foreach($products as $product)
        <div class="product-snippet new-snippet ab-promo--control ab-price-view__control">
            <div class="product-card catalog-card" data-tag="card"> 
                
                <a class="product-card__link" data-tag="link" data-card-id="235467574" 

                    href="/product/vlazhnye-detskie-salfetki-99-vody-zhiraf-10kh80-sht-235467574">


                    <div class="product-card__picture" data-tag="cardImgWrap">
                        <div class="product-card__picture-inner" data-tag="pictureInner">
                            <div class="swiper product-card__carousel swiper-initialized swiper-horizontal swiper-backface-hidden" data-tag="carousel" data-id="235467574">
                                <div class="swiper-wrapper" data-tag="swiperWrapper" style="">
                                    <div class="card-img swiper-slide is-loaded swiper-slide-active">
                                        <picture>
                                            <img 

                                                alt="{{$product->name}}" class="main-img" loading="lazy" 
                                                src="{{$product->path_image}}">

                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </div><button class="product-card__favourites" type="button" data-tag="favouritesBtn"
                            aria-label="Добавить в избранное"> <svg class="svg-icon">
                                <use class="icon-card-favourite" data-icon="new-card-favourite"
                                    href="#new-card-favourite" xlink:href="#new-card-favourite"></use>
                            </svg> </button>
                        <div class="product-card__picture-labels" data-tag="pictureLabels">
                            <div class="product-card__quick-view-wrapper" data-tag="quickViewBtn"> <button
                                    type="button" class="product-card__quick-view-btn"
                                    data-text="strQuickView">Быстрый просмотр</button> </div>
                            <div class="product-card__badges" data-tag="badges">
                                <div class="product-card__catalog-badges"><span class="product-card__sale">
                                    

                                    −{{$product->discount}}%</span>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card__info" data-tag="productCardInfo">
                        <div class="product-card__price price--wb-wallet" data-tag="price"> <span
                                class="price"><span class="product-card__wallet"><svg class="svg-icon icon-wallet">
                                        <use href="#Union3pxWallet" xlink:href="#Union3pxWallet"></use>
                                    </svg></span> <span class="price__from price--wb-wallet hide"
                                    data-tag="productCardPriceFrom" data-text="strFrom">от</span> 
                                    <span class="price__lower price--wb-wallet" data-tag="salePrice">


                                        {{$product->price - ($product->price*$product->discount/100)}}


                                    </span> 
                                    <span class="price__lower-currency price--wb-wallet" data-tag="saleCurrency"> ₽</span>
                                <span class="price__old" data-tag="oldPrice"> <del class="price__old-value" data-tag="visualPrice">

                                    {{$product->price}} ₽


                                </del> </span> </span> </div>
                        <div class="product-card__title" data-tag="title">
                            <div class="product-card__original"><svg class="svg-icon icon-original-new">
                                    <use href="#Union3pxCheck" xlink:href="#Union3pxCheck"></use>
                                </svg></div>
                            <div class="product-card__title-text" data-tag="brandName"><span
                                    class="product-card__brand"></span>
                                    <span class="product-card__name"> 


                                    {{$product->name}}


                                </span></div>
                        </div>
                        <div class="product-card__info-row"><span class="product-card__rating"><svg
                                    class="svg-icon icon-star">
                                    <use href="#FilledStar" xlink:href="#FilledStar"></use>
                                </svg><span>4.9</span></span><span class="product-card__reviews"><svg
                                    class="svg-icon icon-reviews">
                                    <use href="#Union3pxBalloon" xlink:href="#Union3pxBalloon"></use>
                                </svg><span> арт.:#{{$product->id}}</span></span></div>
                    </div>
                </a> </div>
            <div class="product-card__controls" data-tag="controls">
                

                <!--TO DO реализовать добавление в корзину -->
                <a href="/addToCart?productID={{$product->id}}"
                    class="btn product-card__btn btn-basket btn--primary btn--new-snippet" data-tag="basketBtn"
                    data-action="1"><svg class="svg-icon icon-cart-thin-new">
                        <use href="#Outline2pxCart" xlink:href="#Outline2pxCart"></use>
                    </svg>
                    <span>Добавить в корзину</span>
                </a>
                <!-- -->


                <div class="product-card__sizes bottom-sizes" data-tag="bottomSizes"></div>
            </div>
        </div>

        @endforeach
    </div>
</div>
<!-- -->

@include('\shop-layout\footer')




<style>
    .recommendations-page {
        margin: 0 auto;
        width: 1400px;
        flex-direction: column;
        gap: 40px;
        margin-bottom: 40px;
        display: flex;
    }

    .small-cards-row {
        grid-gap: 2px;
        grid-template-columns: repeat(12, 1fr);
        gap: 2px;
        display: grid;
    }
</style>
