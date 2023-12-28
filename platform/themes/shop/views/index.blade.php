<!--header area start-->
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="language_currency top">
                        <ul>
                            <li class="language"><a href="#"><img src="{{ Theme::asset()->url('img/icon/language.png') }}" alt=""> English
                                    <i class="icon-right ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Russian</a></li>
                                </ul>
                            </li>
                            <li class="currency"><a href="#"> $ <i class="icon-right ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">€ Euro</a></li>
                                    <li><a href="#">£ Pound Sterling</a></li>
                                    <li><a href="#">$ US Dollar</a></li>
                                </ul>
                            </li>
                            <li><a href="tel:0123456789">0123456789</a></li>

                        </ul>
                    </div>
                    <div class="language_currency bottom">
                        <ul>
                            <li><span>Mon - Fri: 8:00 - 18:00</span></li>
                            <li class="account"><a href="#"> Setting <i
                                        class="icon-right ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_currency bottom_drop_c">
                                    <li><a href="#">€ Euro</a></li>
                                    <li><a href="#">£ Pound Sterling</a></li>
                                    <li><a href="#">$ US Dollar</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="icon-equalizer icons"></i> Compare (3)</a></li>
                            <li><a href="#"><i class="icon-heart"></i> Wishlist (3)</a></li>
                        </ul>
                    </div>
                    <div class="header_account_area">
                        <div class="header_account_list search_list">
                            <a href="javascript:void(0)"><i class="icon-magnifier icons"></i></a>
                            <div class="dropdown_search">
                                <form action="#">
                                    <input placeholder="Search entire store here ..." type="text">
                                    <button type="submit"><i class="icon-magnifier icons"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="header_account_list  mini_cart_wrapper">
                            <a href="javascript:void(0)"><i class="icon-bag icons"></i>
                                <span class="cart_itemtext">Cart:</span>
                                <span class="cart_itemtotal">$59.00</span>
                                <span class="item_count">2</span>
                            </a>
                            <!--mini cart-->
                            <div class="mini_cart">
                                <div class="cart_gallery">
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{ Theme::asset()->url('img/product/product1.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Juicy Couture Tricot</a>
                                            <p>1 x <span> $30.00 </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-ios-close-outline"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{Theme::asset()->url('img/product/product2.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Juicy Couture Juicy</a>
                                            <p>1 x <span> $29.00 </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-ios-close-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mini_cart_table">
                                    <div class="cart_table_border">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">$125.00</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">$125.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="cart.html"><i class="fa fa-shopping-cart"></i> View cart</a>
                                    </div>
                                    <div class="cart_button">
                                        <a href="checkout.html"><i class="fa fa-sign-in"></i> Checkout</a>
                                    </div>

                                </div>
                            </div>
                            <!--mini cart end-->
                        </div>
                    </div>

                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Layouts</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                            <li><a href="shop-list.html">List View</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">other Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product Types</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                            <li><a href="product-grouped.html">product grouped</a></li>
                                            <li><a href="variable-product.html">product variable</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                    <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                </ul>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">pages </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">services</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="contact.html">contact</a></li>
                                    <li><a href="login.html">login</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="my-account.html">my account</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about.html">about Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html"> Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> demo@example.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->

<header>
    <div class="main_header">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="language_currency top_left">
                            <ul>
                                <li class="language"><a href="#"><img src=" {{ Theme::asset()->url('img/icon/language.png') }}" alt="">
                                        English <i class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Russian</a></li>
                                    </ul>
                                </li>
                                <li class="currency"><a href="#"> $ <i
                                            class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">€ Euro</a></li>
                                        <li><a href="#">£ Pound Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li>
                                <li><a href="tel:0123456789">0123456789</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="language_currency text-right">
                            <ul>
                                <li><span>Mon - Fri: 8:00 - 18:00</span></li>
                                <li class="account"><a href="#"> Setting <i
                                            class="icon-right ion-ios-arrow-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">€ Euro</a></li>
                                        <li><a href="#">£ Pound Sterling</a></li>
                                        <li><a href="#">$ US Dollar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="icon-equalizer icons"></i> Compare (3)</a></li>
                                <li><a href="#"><i class="icon-heart"></i> Wishlist (3)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_middle sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="index.html"><img src="{{ Theme::asset()->url('img/logo/logo.png') }}" alt=""></a>
                        </div>

                    </div>
                    <div class="col-lg-10">
                        <div class="header_right_info menu_position">
                            <!--main menu start-->
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="index.html">home<i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="index.html">Home shop 1</a></li>
                                                <li><a href="index-2.html">Home shop 2</a></li>
                                                <li><a href="index-3.html">Home shop 3</a></li>
                                                <li><a href="index-4.html">Home shop 4</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega_items"><a href="shop.html">shop<i
                                                    class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu">
                                                <ul class="mega_menu_inner">
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                            <li><a href="shop-fullwidth-list.html">Full Width
                                                                    list</a></li>
                                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a>
                                                            </li>
                                                            <li><a href="shop-right-sidebar-list.html"> Right
                                                                    Sidebar list</a></li>
                                                            <li><a href="shop-list.html">List View</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">other Pages</a>
                                                        <ul>
                                                            <li><a href="cart.html">cart</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            <li><a href="404.html">Error 404</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Product Types</a>
                                                        <ul>
                                                            <li><a href="product-details.html">product details</a>
                                                            </li>
                                                            <li><a href="product-sidebar.html">product sidebar</a>
                                                            </li>
                                                            <li><a href="product-grouped.html">product grouped</a>
                                                            </li>
                                                            <li><a href="variable-product.html">product variable</a>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="#"><img src="{{ Theme::asset()->url('img/bg/banner_menu.jpg') }}"
                                                                         alt=""></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="services.html">services</a></li>
                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html"> Contact Us</a></li>
                                        <li><a href="about.html"> About us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                            <div class="header_account_area">
                                <div class="header_account_list search_list">
                                    <a href="javascript:void(0)"><i class="icon-magnifier icons"></i></a>
                                    <div class="dropdown_search">
                                        <form action="#">
                                            <input placeholder="Search entire store here ..." type="text">
                                            <button type="submit"><i class="icon-magnifier icons"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header_account_list  mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="icon-bag icons"></i>
                                        <span class="cart_itemtext">Cart:</span>
                                        <span class="cart_itemtotal">$59.00</span>
                                        <span class="item_count">2</span>
                                    </a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="cart_gallery">
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{ Theme::asset()->url('img/product/product1.jpg') }}"
                                                                     alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Juicy Couture Tricot</a>
                                                    <p>1 x <span> $30.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="ion-ios-close-outline"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{ Theme::asset()->url('img/product/product2.jpg') }}"
                                                                     alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Juicy Couture Juicy</a>
                                                    <p>1 x <span> $29.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="ion-ios-close-outline"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="cart.html"><i class="fa fa-shopping-cart"></i> View
                                                    cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.html"><i class="fa fa-sign-in"></i> Checkout</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->

<!--slider area start-->
<section class="slider_section">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg=" {{ Theme::asset()->url('img/slider/slider1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h2>Stop & wear</h2>
                            <h1>Cosmetic Ingredients</h1>
                            <p>
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laboruLorem ipsum dolor sit amet datat non proident
                            </p>
                            <a href="shop.html">+ Shop Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="{{ Theme::asset()->url('img/slider/slider2.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h2>Cosmetics Accessories</h2>
                            <h1>Everything You Need</h1>
                            <p>
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laboruLorem ipsum dolor sit amet datat non proident
                            </p>
                            <a href="shop.html">+ Shop Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

<!--banner area start-->
<div class="banner_gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>2020 top collections</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="banner_gallery_left">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{ Theme::asset()->url('img/bg/banner1.jpg') }}" alt=""></a>
                        </div>
                        <div class="banner_text">
                            <h3>Skin care</h3>
                            <p>/ 09 items</p>
                        </div>
                    </div>
                    <div class="banner_left_top">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.html"><img src="{{ Theme::asset()->url('img/bg/banner2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="banner_text">
                                        <h3>Lips</h3>
                                        <p>/ 09 items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.html"><img src="{{ Theme::asset()->url('img/bg/banner3.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="banner_text">
                                        <h3>Make-Up</h3>
                                        <p>/ 09 items</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="banner_gallery_right">
                    <div class="single_banner mb-30">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{ Theme::asset()->url('img/bg/banner4.jpg') }}" alt=""></a>
                        </div>
                        <div class="banner_text">
                            <h3>Brushes</h3>
                            <p>/ 09 items</p>
                        </div>
                    </div>
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="{{ Theme::asset()->url('img/bg/banner5.jpg') }}" alt=""></a>
                        </div>
                        <div class="banner_text">
                            <h3>Accessories</h3>
                            <p>/ 09 items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->

<!--product area start-->
<div class="product_area product_deals mb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Deal of the week</h2>
                    <p>Sale off 30% all products </p>
                </div>
            </div>
        </div>
        <div class="product_container">
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_dl_column3 owl-carousel">
                        <div class="deals_item_product">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product1.jpg') }}" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product2.jpg') }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-15%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html"
                                                                        title="Add to Wishlist"><i class="icon-heart icons"></i></a>
                                                </li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-refresh icons"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-magnifier-add icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Juicy Couture Juicy
                                                Quilted Terry Track</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$235.00</span>
                                            <span class="current_price">$30.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html">+ Add to cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <div class="product_timing">
                                <div data-countdown="2022/12/15"></div>
                            </div>
                        </div>
                        <div class="deals_item_product">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product3.jpg') }}" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product4.jpg') }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-15%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html"
                                                                        title="Add to Wishlist"><i class="icon-heart icons"></i></a>
                                                </li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-refresh icons"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-magnifier-add icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Fila Locker Room
                                                Varsity Jacket</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$255.00</span>
                                            <span class="current_price">$40.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html">+ Add to cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <div class="product_timing">
                                <div data-countdown="2022/12/15"></div>
                            </div>
                        </div>
                        <div class="deals_item_product">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product5.jpg') }}" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product1.jpg') }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-15%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html"
                                                                        title="Add to Wishlist"><i class="icon-heart icons"></i></a>
                                                </li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-refresh icons"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-magnifier-add icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Originals Kaval
                                                Windbreaker Winter</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$225.00</span>
                                            <span class="current_price">$35.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html">+ Add to cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <div class="product_timing">
                                <div data-countdown="2022/12/15"></div>
                            </div>
                        </div>
                        <div class="deals_item_product">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product4.jpg') }}" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img
                                                src="{{ Theme::asset()->url('img/product/product3.jpg') }}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-15%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html"
                                                                        title="Add to Wishlist"><i class="icon-heart icons"></i></a>
                                                </li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-refresh icons"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-magnifier-add icons"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html">Juicy Couture Solid
                                                Sleeve Puffer</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">$180.00</span>
                                            <span class="current_price">$80.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html">+ Add to cart</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <div class="product_timing">
                                <div data-countdown="2022/12/15"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->

<!--product area start-->
<div class="product_area  mb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>New Arrivals</h2>
                        <p>Add our new arrivals to your weekly lineup</p>
                    </div>
                    <div class="product_tab_btn">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#makeup" role="tab" aria-controls="makeup"
                                   aria-selected="true">
                                    Makeup
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#skin" role="tab" aria-controls="skin"
                                   aria-selected="false">
                                    Skin Care
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#health" role="tab" aria-controls="health"
                                   aria-selected="false">
                                    Health Care
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#nailart" role="tab" aria-controls="nailart"
                                   aria-selected="false">
                                    Nail Art & Tools
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="makeup" role="tabpanel">
                            <div class="product_gallery">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="product_gallery_left">
                                            <div class="product_carousel product_column1 owl-carousel">
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig1.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig2.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Juicy Couture Juicy
                                                                    Quilted Terry Track</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$235.00</span>
                                                                <span class="current_price">$30.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig3.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig4.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Fila Locker Room
                                                                    Varsity Jacket</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$255.00</span>
                                                                <span class="current_price">$40.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product_gallery_right">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items top">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/productbig1.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/productbig2.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Originals
                                                                            Kaval Windbreaker</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$245.00</span>
                                                                        <span class="current_price">$76.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product8.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Juicy
                                                                            Couture Juicy Quilted</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$180.00</span>
                                                                        <span class="current_price">$58.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product11.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product10.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Water and
                                                                            Wind Resistant</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$176.00</span>
                                                                        <span class="current_price">$86.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">New Balance
                                                                            Fresh Foam</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$156.00</span>
                                                                        <span class="current_price">$82.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="skin" role="tabpanel">
                            <div class="product_gallery">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="product_gallery_left">
                                            <div class="product_carousel product_column1 owl-carousel">
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig3.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig4.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Fila Locker Room
                                                                    Varsity Jacket</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$255.00</span>
                                                                <span class="current_price">$40.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig1.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig2.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Juicy Couture Juicy
                                                                    Quilted Terry Track</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$235.00</span>
                                                                <span class="current_price">$30.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product_gallery_right">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items top">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product11.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product10.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Water and
                                                                            Wind Resistant</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$176.00</span>
                                                                        <span class="current_price">$86.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">New Balance
                                                                            Fresh Foam</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$156.00</span>
                                                                        <span class="current_price">$82.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product6.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Originals
                                                                            Kaval Windbreaker</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$245.00</span>
                                                                        <span class="current_price">$76.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product8.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Juicy
                                                                            Couture Juicy Quilted</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$180.00</span>
                                                                        <span class="current_price">$58.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="health" role="tabpanel">
                            <div class="product_gallery">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="product_gallery_left">
                                            <div class="product_carousel product_column1 owl-carousel">
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig1.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig2.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Juicy Couture Juicy
                                                                    Quilted Terry Track</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$235.00</span>
                                                                <span class="current_price">$30.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig3.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig4.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Fila Locker Room
                                                                    Varsity Jacket</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$255.00</span>
                                                                <span class="current_price">$40.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product_gallery_right">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items top">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product8.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Juicy
                                                                            Couture Juicy Quilted</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$180.00</span>
                                                                        <span class="current_price">$58.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product6.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Originals
                                                                            Kaval Windbreaker</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$245.00</span>
                                                                        <span class="current_price">$76.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">New Balance
                                                                            Fresh Foam</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$156.00</span>
                                                                        <span class="current_price">$82.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product11.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product10.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Water and
                                                                            Wind Resistant</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$176.00</span>
                                                                        <span class="current_price">$86.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nailart" role="tabpanel">
                            <div class="product_gallery">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="product_gallery_left">
                                            <div class="product_carousel product_column1 owl-carousel">
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig3.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig4.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Fila Locker Room
                                                                    Varsity Jacket</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$255.00</span>
                                                                <span class="current_price">$40.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                                <article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig1.jpg') }}"
                                                                    alt=""></a>
                                                            <a class="secondary_img"
                                                               href="product-details.html"><img
                                                                    src="{{ Theme::asset()->url('img/product/productbig2.jpg') }}"
                                                                    alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-15%</span>
                                                            </div>
                                                            <div class="action_links">
                                                                <ul>
                                                                    <li class="wishlist"><a href="wishlist.html"
                                                                                            title="Add to Wishlist"><i
                                                                                class="icon-heart icons"></i></a>
                                                                    </li>
                                                                    <li class="compare"><a href="#"
                                                                                           title="Add to Compare"><i
                                                                                class="icon-refresh icons"></i></a>
                                                                    </li>
                                                                    <li class="quick_button"><a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modal_box"
                                                                                                title="quick view"> <i
                                                                                class="icon-magnifier-add icons"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <figcaption class="product_content">
                                                            <h4 class="product_name"><a
                                                                    href="product-details.html">Juicy Couture Juicy
                                                                    Quilted Terry Track</a></h4>
                                                            <div class="price_box">
                                                                <span class="old_price">$235.00</span>
                                                                <span class="current_price">$30.00</span>
                                                            </div>
                                                            <div class="add_to_cart">
                                                                <a href="cart.html">+ Add to cart</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product_gallery_right">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items top">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product11.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product10.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Water and
                                                                            Wind Resistant</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$176.00</span>
                                                                        <span class="current_price">$86.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">New Balance
                                                                            Fresh Foam</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$156.00</span>
                                                                        <span class="current_price">$82.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="product_items">
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product6.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product7.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Originals
                                                                            Kaval Windbreaker</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$245.00</span>
                                                                        <span class="current_price">$76.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                        <article class="single_product">
                                                            <figure>
                                                                <div class="product_thumb">
                                                                    <a class="primary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product8.jpg') }}"
                                                                            alt=""></a>
                                                                    <a class="secondary_img"
                                                                       href="product-details.html"><img
                                                                            src="{{ Theme::asset()->url('img/product/product9.jpg') }}"
                                                                            alt=""></a>
                                                                    <div class="label_product">
                                                                        <span class="label_sale">-15%</span>
                                                                    </div>
                                                                    <div class="action_links">
                                                                        <ul>
                                                                            <li class="wishlist"><a
                                                                                    href="wishlist.html"
                                                                                    title="Add to Wishlist"><i
                                                                                        class="icon-heart icons"></i></a>
                                                                            </li>
                                                                            <li class="compare"><a href="#"
                                                                                                   title="Add to Compare"><i
                                                                                        class="icon-refresh icons"></i></a>
                                                                            </li>
                                                                            <li class="quick_button"><a href="#"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#modal_box"
                                                                                                        title="quick view"> <i
                                                                                        class="icon-magnifier-add icons"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <figcaption class="product_content">
                                                                    <h4 class="product_name"><a
                                                                            href="product-details.html">Juicy
                                                                            Couture Juicy Quilted</a></h4>
                                                                    <div class="price_box">
                                                                        <span class="old_price">$180.00</span>
                                                                        <span class="current_price">$58.00</span>
                                                                    </div>
                                                                    <div class="add_to_cart">
                                                                        <a href="cart.html">+ Add to cart</a>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->

<!--testimonial area start-->
<div class="testimonial_area mb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title testi_title">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <h2>Client testimonials</h2>
                </div>
            </div>
        </div>
        <div class="testimonial_container">
            <div class="row">
                <div class="testimonial_carousel testimonial_column3 owl-carousel">
                    <div class="col-lg-4">
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <img src=" {{ Theme::asset()->url('img/about/testimonial1.png') }}" alt="">
                            </div>
                            <div class="testimonial_content">
                                <h3>orando BLoom</h3>
                                <a href="https://hasthemes.com/">/demo@hasthemes.com</a>
                                <p>Perfect Themes and the best of all that you have many options to choose! Best
                                    Support team ever!Very fast responding and experts on their fields! Thank you
                                    very much!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <img src="{{ Theme::asset()->url('img/about/testimonial2.png') }}" alt="">
                            </div>
                            <div class="testimonial_content">
                                <h3>orando BLoom</h3>
                                <a href="https://hasthemes.com/">/demo@posthemes.com</a>
                                <p>Perfect Themes and the best of all that you have many options to choose! Best
                                    Support team ever!Very fast responding and experts on their fields! Thank you
                                    very much!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <img src="{{ Theme::asset()->url('img/about/testimonial3.png') }}" alt="">
                            </div>
                            <div class="testimonial_content">
                                <h3>orando BLoom</h3>
                                <a href="https://hasthemes.com/">/demo@hasthemes.com</a>
                                <p>Perfect Themes and the best of all that you have many options to choose! Best
                                    Support team ever!Very fast responding and experts on their fields! Thank you
                                    very much!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <img src="{{ Theme::asset()->url('img/about/testimonial1.png') }}" alt="">
                            </div>
                            <div class="testimonial_content">
                                <h3>orando BLoom</h3>
                                <a href="https://hasthemes.com/">/demo@hasthemes.com</a>
                                <p>Perfect Themes and the best of all that you have many options to choose! Best
                                    Support team ever!Very fast responding and experts on their fields! Thank you
                                    very much!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--testimonial area end-->

<!--banner static area start-->
<div class="banner_static_area mb-95">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="banner_static_content">
                    <h3>Stop & wear</h3>
                    <h2>Model Skin Care <br> Essentials</h2>
                    <p>The concentration of a perfume is the percentage of pure fragrance oil to stabilizing
                        ingredients, which determines lasting power.</p>
                    <a href="shop.html">+ Shop Now</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="banner_thumb static_b_thumb">
                    <a href="shop.html"><img src="{{ Theme::asset()->url('img/bg/banner6.jpg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner static area end-->

<!--blog area start-->
<section class="blog_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>From Our Blog</h2>
                    <p>There are latest blog posts </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog_carousel blog_column3 owl-carousel">
                <div class="col-lg-3">
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="{{ Theme::asset()->url('img/blog/blog1.jpg') }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html"> This is First Post For
                                        XipBlog</a></h4>
                                <p>Posted by Demo Hasthemes <span>Mar 25, 2021</span></p>
                                <footer class="blog_footer">
                                    <a href="blog-details.html">+ Read More</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3">
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="{{ Theme::asset()->url('img/blog/blog2.jpg') }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html"> This is Secound Post For
                                        XipBlog</a></h4>
                                <p>Posted by Demo Hasthemes <span>Mar 25, 2021</span></p>
                                <footer class="blog_footer">
                                    <a href="blog-details.html">+ Read More</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3">
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="{{ Theme::asset()->url('img/blog/blog3.jpg') }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html"> This is Third Post For
                                        XipBlog</a></h4>
                                <p>Posted by Demo Hasthemes <span>Mar 25, 2021</span></p>
                                <footer class="blog_footer">
                                    <a href="blog-details.html">+ Read More</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3">
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="{{ Theme::asset()->url('img/blog/blog4.jpg') }}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html"> This is Fourth Post For
                                        XipBlog</a></h4>
                                <p>Posted by Demo Hasthemes <span>Mar 25, 2021</span></p>
                                <footer class="blog_footer">
                                    <a href="blog-details.html">+ Read More</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
<!--blog area end-->

<!--brand area start-->
<div class="brand_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel ">
                    <div class="single_brand">
                        <a href="#"><img src="{{ Theme::asset()->url('img/brand/brand1.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ Theme::asset()->url('img/brand/brand2.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ Theme::asset()->url('img/brand/brand3.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ Theme::asset()->url('img/brand/brand4.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ Theme::asset()->url('img/brand/brand5.jpg') }}" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a href="#"><img src="{{ Theme::asset()->url('img/brand/brand1.jpg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--brand area end-->

<!--bonique messages area start-->
<div class="bonique_messages_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bonique_messages_text">
                    <h3>bonique</h3>
                    <p>The concentration of a perfume is the percentage of pure fragrance oil to stabilizing
                        ingredients, which determines lasting power. Lorem ipsum dolor sit amet, consectetur cing
                        elit. Suspe ndissesuscipit sagittis leo sit met condimentum estibulum issim Lorem ipsum
                        dolor sit amet, consectetur cing elit.</p>
                    <a href="#">+ Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--bonique messages area end-->

<!--shipping area start-->
<div class="shipping_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <i class="icon-call-out icons"></i>
                    </div>
                    <div class="shipping_content">
                        <h3><a href="tel:0123456789">0123456789</a></h3>
                        <p>/ Phone</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>Your address goes here.</h3>
                        <p>/ Address</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_shipping col3">
                    <div class="shipping_icone">
                        <i class="icon-envelope icons"></i>
                    </div>
                    <div class="shipping_content">
                        <h3><a href="#">demo@example.com</a></h3>
                        <p>/ Email</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shipping area end-->

<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">

                            <ul>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#"> Secure payment</a></li>
                                <li><a href="contact.html"> Contact Us</a></li>
                                <li><a href="#"> Sitemap</a></li>
                                <li><a href="#"> Stores</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Custom Links</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Legal Notice</a></li>
                                <li><a href="#"> Prices dro</a></li>
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Best sales</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="my-account.html"> My account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Personal info</a></li>
                                <li><a href="#"> Orders</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="#">Credit slips</a></li>
                                <li><a href="#">Addresses</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Follow us on</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i> YouTube</a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> Google +</a>
                                </li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <div class="widgets_container widget_newsletter">
                        <h3>Subscribe</h3>
                        <p>You may unsubscribe at any moment. For that purpose, please find our contact info in the
                            legal notice.</p>
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off"
                                       placeholder="Your email address"/>
                                <button id="mc-submit"><i class="icon-arrow-right-circle icons"></i></button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p class="copyright-text">&copy; 2021 <a href="index.html">Bonique</a>. Made with <i
                                class="fa fa-heart text-danger"></i> by <a href="https://hasthemes.com/"
                                                                           target="_blank">HasThemes</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <a href="#"><img src="{{ Theme::asset()->url('img/icon/payment.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ion-android-close"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{ Theme::asset()->url('img/product/productbig1.jpg') }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{ Theme::asset()->url('img/product/productbig2.jpg') }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{ Theme::asset()->url('img/product/productbig3.jpg') }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="{{ Theme::asset()->url('img/product/productbig4.jpg') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
                                               aria-controls="tab1" aria-selected="false"><img
                                                    src="{{ Theme::asset()->url('img/product/product2.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
                                               aria-controls="tab2" aria-selected="false"><img
                                                    src="{{ Theme::asset()->url('img/product/product10.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
                                               role="tab" aria-controls="tab3" aria-selected="false"><img
                                                    src="{{ Theme::asset()->url('img/product/product5.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"
                                               aria-controls="tab4" aria-selected="false"><img
                                                    src="{{ Theme::asset()->url('img/product/product4.jpg') }}" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Donec Ac Tempus</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>
                                    <span class="old_price">$78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                        laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                        in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                        recusandae </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->

<!--news letter popup start-->
<div class="newletter-popup">
    <div id="boxes" class="newletter-container">
        <div id="dialog" class="window">
            <div id="popup2">
                <span class="b-close"><span>close</span></span>
            </div>
            <div class="box">
                <div class="newletter-title">
                    <h2>Newsletter</h2>
                </div>
                <div class="box-content newleter-content">
                    <label class="newletter-label">Enter your email address to subscribe our notification of our new
                        post &amp; features by email.</label>
                    <div id="frm_subscribe">
                        <form name="subscribe" id="subscribe_popup">
                            <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                            <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail"
                                   placeholder="Enter you email address here...">
                            <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                            <div id="notification"></div>
                            <a class="theme-btn-outlined"
                               onclick="email_subscribepopup()"><span>Subscribe</span></a>
                        </form>
                        <div class="subscribe-bottom">
                            <input type="checkbox" id="newsletter_popup_dont_show_again">
                            <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                        </div>
                    </div>
                    <!-- /#frm_subscribe -->
                </div>
                <!-- /.box-content -->
            </div>
        </div>

    </div>
    <!-- /.box -->
</div>
<!--news letter popup start-->
