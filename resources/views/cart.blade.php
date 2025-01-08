@include('\shop-layout\header')


<h1>КОНТЕНТ Корзина юзера {{$username}}</h1>



<!-- -->
<div class="basket" data-tag="basketMain">
    <div class="page-loader" data-tag="basketLoader">
        <div class="loader"></div>
    </div>
    <div class="basket__widgets--mobile hide" data-tag="basketWidgetsMob">
        <div class="basket__widgets-container" data-tag="widgets"></div>
    </div>
    <div class="basket__content"> <a class="basket__product-link hide" data-tag="linkToProduct"> <svg
                class="svg-icon icon-chevron-left">
                <use data-icon="chevron-left" href="#chevron-left" xlink:href="#chevron-left"></use>
            </svg>
            <div class="basket__product-link-title" data-tag="linkToProductTitle"></div>
        </a>
        <div class="basket__header basket__header--with-share-btn" data-tag="pageHeading">
            <div class="basket__title-with-counter">
                <h1 class="basket__main-title" data-text="strCart" data-tag="pageTitle">Корзина</h1> <span
                    class="basket__items-counter" data-tag="counter">2</span>
            </div>
            <div class="basket__header-controls"> <button type="button" class="basket__share-btn basket-share-btn"
                    data-place="title" data-tag="shareBtn"> <svg class="svg-icon">
                        <use data-icon="share-icon-2" href="#share-icon-2" xlink:href="#share-icon-2"></use>
                    </svg> <span class="basket-share-btn__text" data-text="strShare">Поделиться</span> <span
                        class="basket-share-btn__qty" data-tag="shareCartQty">2</span> </button> <button type="button"
                    class="basket__check-box is-active" data-place="title" data-tag="selectAllBtn">
                    <!-- div ниже относится к  @exp isCartLeftCheckbox -->
                    <div class="b-item__check select-all__checkbox hide is-active" data-tag="selectAllCheckBox">
                    </div> <span data-text="strSelectAll">Выбрать все</span>
                </button> </div>
        </div>
        <section data-tag="basketContent">
            <section class="basket-section">
                <div class="basket-alert hide" data-tag="alert">
                    <div class="basket-alert__icon"> <svg class="svg-icon icon-close-circle">
                            <use data-icon="close-circle" href="#close-circle" xlink:href="#close-circle"></use>
                        </svg> </div>
                    <div class="basket-alert__text"> <b data-tag="alertTitle"></b> </div>
                </div>
                <div data-tag="basketGroups">
                    <div class="basket-group">
                        <div class="basket-group__body">
                            <div class="basket-list" data-tag="itemsList" data-group="">




                                <!--Товарчики в корзине Foreach-->
                                @foreach($userCart as $position)



                                 


                                <div class="b-item" data-id="113525227">
                                    <div class="b-item__picture">
                                        <div class="b-item__picture-inner"> <a
                                                href="/product/khalat-meditsinskij-na-knopkakh-s-dlinnym-rukavom-64909680"
                                                class="b-item__link" data-tag="itemPictureLink">
                                                <picture data-tag="itemPicture" class="b-item__img"> <img loading="lazy"
                                                        fetchpriority="low" data-tag="image"
                                                        alt="{{$position->product->name}}"
                                                        src="{{$position->product->path_image}}">
                                                </picture>
                                            </a> </div>
                                    </div>
                                    <div class="b-item__content"> 
                                        <a 
                                        
                                        href="/product/khalat-meditsinskij-na-knopkakh-s-dlinnym-rukavom-64909680" 
                                        
                                        class="b-item__title" data-tag="itemLink"> 
                                            <span data-tag="itemName" data-card-id="64909680" data-opt-id="113525227">

                                                {{$position->product->name}}

                                            </span> </a>

                                        <div class="b-item__params" data-tag="itemParams"><span
                                                class="b-params__brand">BRAND --TODO--</span>, <span
                                                class="b-params__colors">белый--TODO--</span>, <span
                                                class="b-params__size">54--TODO--</span>
                                        </div>


                                        <div class="b-item__controls">
                                            <div class="b-item__count">



                                                <!-- кнопки + - Пока каждый раз отправляют GET запрос-->
                                                <div class="quantity"> 
                                                    
                                                    <a href="/changeQuantity?productID={{$position->product->id}}&count={{$position->quantity-1}}"  
                                                    type="button" class="quantity__minus" data-tag="quantityMinus"> −  </a> 


                                                    <input type="number" class="quantity__input" data-tag="quantityInput" 
                                                    value="{{$position->quantity}}"> 


                                                    <a href="/changeQuantity?productID={{$position->product->id}}&count={{$position->quantity+1}}"
                                                    
                                                    type="button" class="quantity__plus" data-tag="quantityPlus"> + </a>
                                                </div>
                                                <!-- кнопки + - -->


                                            </div> <button type="button" class="b-item__favourite-btn"
                                                data-tag="favoriteButton" aria-label="Добавить в избранное"> <svg
                                                    class="svg-icon icon-basket-favourite">
                                                    <use class="icon-basket-favourite--normal"
                                                        data-icon="favourites-basket" href="#favourites-basket"
                                                        xlink:href="#favourites-basket"></use>
                                                    <use class="icon-basket-favourite--active"
                                                        data-icon="favourites-basket-fill"
                                                        href="#favourites-basket-fill"
                                                        xlink:href="#favourites-basket-fill"></use>
                                                    <use class="icon-basket-favourite--xs-normal"
                                                        data-icon="card-favourite-normal"
                                                        href="#card-favourite-normal"
                                                        xlink:href="#card-favourite-normal"></use>
                                                    <use class="icon-basket-favourite--xs-hover"
                                                        data-icon="card-favourite-hover" href="#card-favourite-hover"
                                                        xlink:href="#card-favourite-hover"></use>
                                                    <use class="icon-basket-favourite--xs-active-normal"
                                                        data-icon="card-favourite-active-normal"
                                                        href="#card-favourite-active-normal"
                                                        xlink:href="#card-favourite-active-normal"></use>
                                                    <use class="icon-basket-favourite--xs-active-hover"
                                                        data-icon="card-favourite-active-hover"
                                                        href="#card-favourite-active-hover"
                                                        xlink:href="#card-favourite-active-hover"></use>
                                                </svg> </button> <button type="button" class="b-item__delete"
                                                data-tag="deleteButton"> <svg class="svg-icon icon-trash-basket">
                                                    <use data-icon="basket-trash" href="#basket-trash"
                                                        xlink:href="#basket-trash"></use>
                                                </svg> </button>
                                            <div class="b-item__stock hide" data-tag="itemStock"> <span
                                                    class="b-item__qty-str" data-tag="strQty"></span> <span
                                                    class="b-item__qty" data-tag="qty"></span> </div>
                                        </div>
                                        <div class="b-item__note" data-tag="note">
                                            <div class="b-item__delivery-date" data-tag="deliveryDate">Завтра
                                            </div>
                                            <div class="b-item__return-fee hidden-after" data-tag="returnFee">
                                                <div class="attribute-tooltip">
                                                    <div class="attribute-tooltip__element" data-tag="element">
                                                        <span>Бесплатный отказ</span>
                                                    </div>
                                                    <div class="attribute-tooltip__tooltip-wrapper"
                                                        data-tag="tooltipWrapper" style="left: 0px;">
                                                        <div class="attribute-tooltip__tooltip" data-tag="tooltip">
                                                            <div class="attribute-tooltip__tooltip-text">
                                                                <div class="attribute-tooltip__text-top"
                                                                    data-tag="textTop"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="b-item__payment-label hide" data-tag="paymentLabel"
                                                data-text="strOnlinePayment2">Онлайн-оплата</div>
                                        </div>
                                    </div>
                                    <div class="b-item__total" data-tag="itemTotal">
                                        <div class="b-item__price b-item-price no-tooltip" data-tag="basketPrice">
                                            <div class="b-item-price__container" data-tag="basketPriceContainer">




                                                <div class="b-item-price__lower" data-tag="salePrice">
                                                    {{$position->product->price*$position->quantity}}
                                                    <i> ₽</i>
                                                </div>




                                                <div class="b-item-price__wallet" data-tag="basketPriceWallet">
                                                    <div data-text="strWithWallet">с&nbsp;WB&nbsp;Кошельком</div>
                                                    <div class="b-item-price__wallet-price" data-tag="walletPrice">
                                                        {{($position->product->price - ($position->product->price*$position->product->discount/100))
                                                        *$position->quantity}} ₽</div>
                                                </div>
                                                <div class="b-item-price__old hide">
                                                    <div class="b-item-price__old-value price-crossed-gray"
                                                        data-tag="basePrice">{{$position->product->price*$position->quantity}} ₽</div>
                                                    <div data-tag="discountTooltip"></div>
                                                </div>
                                            </div>
                                            <div class="b-item-duty hide" data-tag="dutyPrice">
                                                <div data-tag="dutyPriceInformation"> <svg class="svg-icon icon-duty">
                                                        <use data-icon="FilledCustomDuties" href="#FilledCustomDuties"
                                                            xlink:href="#FilledCustomDuties"></use>
                                                    </svg> <span class="b-item-duty__text"
                                                        data-tag="dutyCurrentPrice"></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-item__check is-active" data-tag="checkBox"></div>
                                </div>



                                @endforeach   
                                <!--Товарчики в корзине EndForeach-->





                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <section class="basket-section">
            <div class="basket-box is-empty-address" data-tag="deliverySelected">
                <section class="delivery-services form-section">
                    <div class="delivery-services__inner" data-tag="service">
                        <div class="form-section__header">
                            <h2 data-text="strDeliveryTitle">Способ доставки</h2> <button type="button"
                                class="delivery-services__btn btn" data-text="strAddress"
                                data-tag="buttonAdd">Адрес</button>
                        </div>
                        <div data-tag="inner"></div>
                    </div>
                    <div data-tag="kbt"></div>
                    <div class="delivery-services__add-phone hide" data-tag="addPhoneBlock">
                        <div class="phone-switcher" data-tag="addPhoneSwitcher">
                            <div class="phone-switcher__inner" data-tag="phoneInner"><label class="switch-btn">
                                    <input type="checkbox" class="switch-btn__input" data-tag="toggleInput">
                                    <span class="switch-btn__slider"></span> </label>
                                <div class="phone-switcher__desc" data-text="strAdditionalPhone">Доп. телефон для
                                    связи</div>
                            </div>
                        </div>
                        <section class="add-phone-container hide" data-tag="addPhone">
                            <div class="form-group phone-input"> <label for="phone" data-text="strContactPhone"
                                    data-tag="phone">Телефон</label> <input id="phone" name="phone"
                                    type="tel" class="form-control" autocomplete="tel-country-code tel-national"
                                    data-tag="input" data-text="strContactPhone" maxlength="20"
                                    placeholder="+XXXXXXXXXXX"> <span class="form-group__error"
                                    data-tag="inputError"></span> </div>
                        </section>
                    </div>
                </section>
            </div>
            <section class="basket-delivery-container" data-tag="basketDelivery">


            </section>
            <div class="basket-box" data-tag="paymentBlock">
                <div class="payment-block payment-block--unauth">
                    <section class="form-section" data-tag="formSection">
                        <div class="payment-block__inner" data-tag="paymentBlockEdit">
                            <div class="form-section__header">
                                <h2 data-text="strPaymentMethod" data-tag="paymentBlockTitle">Оформить заказ</h2>
                            </div>
                            <div class="payment-block__controls hide" data-tag="controls"> <button type="button"
                                    class="payment-block__add payment-block__add--bank-card btn"
                                    data-tag="newCardBtn"> <svg class="svg-icon icon-plus">
                                        <use data-icon="plus" href="#plus" xlink:href="#plus"></use>
                                    </svg> <span data-text="strBankCard">Карта</span> </button> <button type="button"
                                    class="payment-block__add payment-block__add--sbp btn" data-tag="newSbpBtn"> <svg
                                        class="svg-icon icon-plus">
                                        <use data-icon="plus" href="#plus" xlink:href="#plus"></use>
                                    </svg> <span data-text="strSbpAccount">Счет СБП</span> </button> </div>
                            <div class="payment-block__default-method" data-tag="defaultPaymentMethod"></div>
                            <div class="payment-block__balance-container hide" data-tag="balanceContainer"> <span
                                    class="balance-text payment-block__balance-text"> <span> <span
                                            data-tag="balanceText1" class="hide"></span> <span
                                            data-tag="balanceAmount"></span> </span> <span data-tag="balanceText2"
                                        class="balance-text__balance-description"><span class="payment-block__tooltip"
                                            data-tag="tooltip"> <svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.799805" y="0.799805" width="14.4" height="14.4"
                                                    rx="4" stroke="#9797AF" stroke-width="1.6"></rect>
                                                <path
                                                    d="M9.57014 5.70127C9.57014 5.45007 9.50502 5.23143 9.37476 5.04535C9.25381 4.85927 9.08169 4.71506 8.8584 4.61272C8.63511 4.50108 8.3746 4.44525 8.07688 4.44525C7.61169 4.44525 7.23489 4.56155 6.94647 4.79415C6.66735 5.02674 6.47662 5.33842 6.37428 5.72918H4.8252C4.89032 5.21747 5.06244 4.75693 5.34156 4.34756C5.62067 3.93819 5.99748 3.61256 6.47197 3.37066C6.94647 3.12876 7.49074 3.00781 8.10479 3.00781C8.73745 3.00781 9.28638 3.12411 9.75157 3.35671C10.2168 3.58 10.5703 3.89168 10.8122 4.29174C11.0541 4.6918 11.1751 5.13374 11.1751 5.61753C11.1751 6.05481 11.1053 6.42231 10.9657 6.72004C10.8262 7.01776 10.6587 7.25501 10.4633 7.43178C10.2772 7.60855 10.0214 7.80393 9.69575 8.01792L9.59806 8.0877L9.41663 8.22726C9.18404 8.37612 9.00726 8.50637 8.88631 8.61802C8.76536 8.72966 8.66767 8.86922 8.59324 9.03669C8.51881 9.19485 8.4816 9.39489 8.4816 9.63679V9.9159H6.97438V9.49723C6.97438 9.11577 7.02555 8.79479 7.12789 8.53428C7.23023 8.27378 7.36979 8.05514 7.54656 7.87836C7.72334 7.70159 7.96524 7.51086 8.27226 7.30618L8.41182 7.20849L8.63511 7.05497C8.94214 6.84099 9.17473 6.6363 9.3329 6.44092C9.49106 6.24554 9.57014 5.99899 9.57014 5.70127ZM7.78381 11.1161C8.07223 11.1161 8.31413 11.2138 8.50951 11.4092C8.71419 11.6045 8.81653 11.8464 8.81653 12.1349C8.81653 12.4233 8.71419 12.6698 8.50951 12.8745C8.31413 13.0699 8.07223 13.1676 7.78381 13.1676C7.48609 13.1676 7.23489 13.0699 7.0302 12.8745C6.83482 12.6698 6.73713 12.4233 6.73713 12.1349C6.73713 11.8464 6.83482 11.6045 7.0302 11.4092C7.23489 11.2138 7.48609 11.1161 7.78381 11.1161Z"
                                                    fill="#9797AF"></path>
                                            </svg> <span class="tooltip v2" data-tag="balanceTooltip">Баланс&nbsp;—
                                                ваш личный счет
                                                на&nbsp;сайте. Средства с&nbsp;баланса списываются в&nbsp;первую
                                                очередь</span> </span></span> </span></div> <button type="button"
                                class="payment-block__change-method-btn btn" data-tag="changeMethodBtn"
                                data-text="strChange">Изменить</button>
                        </div>
                        <div class="payment-block__footer" data-tag="forGuest"> <button type="button"
                                class="payment-block__login-btn" data-tag="paymentBtnAuth"
                                data-text="strLoginToProfile">Заказать</button> </div>
                    </section>
                </div>
            </div>

        </section>
    </div>
    <div class="basket__e-customs-and-card-not-available">
        <div class="basket__e-customs-block hide" data-tag="eCustomsBlock">
            <div class="e-customs-block">
                <h3 class="e-customs-block__title" data-tag="title"></h3>
                <div class="e-customs-block__text-wrapper" data-tag="text"></div>
            </div>
        </div>
        <div class="basket__card-not-available hide" data-tag="cardNotAvailable">
            <div class="card-not-available-block">
                <div class="card-not-available-block__container">
                    <h3 class="card-not-available-block__title" data-tag="title"></h3>
                    <div class="card-not-available-block__message" data-tag="message"></div>
                </div>
            </div>
        </div>
        <div class="basket__wb-wallet-banner hide" data-tag="wbWalletBanner"></div>
        <div class="basket__wb-wallet-increase-limits-banner hide" data-tag="wbWalletIncreaseLimitsBanner"></div>
    </div>
    <div class="basket__sidebar" data-tag="totalSidebar">
        <div class="basket__sidebar-inner" data-tag="sidebarInner">
            <div class="basket__widgets--desktop hide" data-tag="basketWidgetsDesk">
                <div class="basket__widgets-container" data-tag="widgets"></div>
            </div>
            <div class="basket__identity-confirmation" data-tag="identityConfirmation"></div>
            <div class="basket__summary" data-tag="summary">
                <div class="basket-summary">



                    <div class="basket-summary__total"> <span data-tag="totalTitle">Итого</span> 
                        <span class="basket-summary__total-value" data-tag="totalSum">
                            {{$totalCost}}
                            <i> ₽</i>
                        </span>
                     </div>


                    <ul class="basket-summary__price basket-summary-price">
                        <li class="basket-summary-price__item"> <span data-tag="totalItems">
                            {{$countPositions}}&nbsp;товара</span>
                            <b data-tag="totalPriceBase">
                                {{$totalCostBase}} ₽</b>
                        </li>
                        <li class="basket-summary-price__item"> <span data-text="strDiscountWB">WB cкидка</span>
                            <b data-tag="totalDiscount">−{{$totalDiscount}} ₽</b>
                        </li>
                        

                        <li class="basket-summary-price__item hide"> <span
                                data-text="strBalanceReplenishment">Пополнение баланса</span> <b
                                data-tag="totalBalance" class="is-negative">
                            </b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->
<style>
    .basket{
        margin:50px;
        margin-left: auto;
        margin-right: auto;
        width:1300px;
    }
</style>
@include('\shop-layout\footer')
