<!--Use class "navbar-fixed" or "navbar-default" -->
<!--If you use "navbar-fixed" it will be sticky menu on scroll (only for large screens)-->

<!-- ======================== Navigation ======================== -->

<nav class="navbar-fixed">

    <div class="container">

        <!-- ==========  Top navigation ========== -->

        <div class="navigation navigation-top clearfix">
            <ul>
                <!--add active class for current page-->

                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>

                <!--Currency selector-->

                <li class="nav-settings">
                    <a href="javascript:void(0);" class="nav-settings-value"> USD $</a>
                    <ul class="nav-settings-list">
                        <li>USD $</li>
                        <li>EUR €</li>
                        <li>CHF Fr.</li>
                        <li>GBP £</li>
                    </ul>
                </li>

                <!--Language selector-->

                <li class="nav-settings">
                    <a href="javascript:void(0);" class="nav-settings-value"> ENG</a>
                    <ul class="nav-settings-list">
                        <li>ENG</li>
                        <li>GER</li>
                        <li>لعربية</li>
                        <li>עִבְרִית</li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>
                <li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a></li>
                <!--  <li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i> <span>3</span></a></li>-->
            </ul>
        </div> <!--/navigation-top-->

        <!-- ==========  Main navigation ========== -->

        <div class="navigation navigation-main">

            <!-- Setup your logo here-->

            <a href="index.html" class="logo"><img src="/images/logo.png" alt="" /></a>

            <!-- Mobile toggle menu -->

            <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

            <!-- Convertible menu (mobile/desktop)-->

            <div class="floating-menu">

                <!-- Mobile toggle menu trigger-->

                <div class="close-menu-wrapper">
                    <span class="close-menu"><i class="icon icon-cross"></i></span>
                </div>

                <ul>
                    <li><a href="index.html">Home</a></li>

                    <!-- Multi-content dropdown -->

                    <li>
                        <a href="index.html">Pages <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown">
                            <div class="navbar-box">

                                <!-- box-1 (left-side)-->

                                <div class="box-1">
                                    <div class="box">
                                        <div class="h2">Find your inspiration</div>
                                        <div class="clearfix">
                                            <p>Homes that differ in terms of style, concept and architectural solutions have been furnished by Furniture Factory. These spaces tell of an international lifestyle that expresses modernity, research and a creative spirit.</p>
                                            <a class="btn btn-clean btn-big" href="products-grid.html">Shop now</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- box-2 (right-side)-->

                                <div class="box-2">
                                    <div class="box clearfix">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <ul>
                                                    <li class="label">Homepage</li>
                                                    <li><a href="index.html">Home - Slider</a></li>
                                                    <li><a href="index-2.html">Home - Tabsy gallery</a></li>
                                                    <li><a href="index-3.html">Home - Slider full screen</a></li>
                                                    <li><a href="index-4.html">Home - Info icons</a></li>
                                                    <li><a href="index-xmas.html">Home - Xmas</a></li>
                                                    <li><a href="index-rtl.html">Home - RTL <span class="label label-warning">New</span></a></li>
                                                    <li><a href="index-5.html">Onepage</a></li>
                                                    <li><a href="index-6.html">Onepage - Filters <span class="label label-warning">Isotope</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul>
                                                    <li class="label">Blog</li>
                                                    <li><a href="blog-grid.html">Blog grid</a></li>
                                                    <li><a href="blog-list.html">Blog list</a></li>
                                                    <li><a href="blog-grid-fullpage.html">Blog fullpage</a></li>
                                                    <li><a href="ideas.html">Blog ideas</a></li>
                                                    <li><a href="article.html">Blog article</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul>
                                                    <li class="label">Pages</li>
                                                    <li><a href="about.html">About us</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="login.html">Login & Register <span class="label label-warning">New</span></a></li>
                                                </ul>
                                                <ul>
                                                    <li class="label">Extras</li>
                                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                                    <li><a href="email-receipt.html">Email template <span class="label label-warning">New</span></a></li>
                                                    <li><a href="404.html">Not found 404 <span class="label label-warning">New</span></a></li>
                                                </ul>
                                            </div>
                                        </div> <!--/row-->
                                    </div> <!--/box-->
                                </div> <!--/box-2-->
                            </div> <!--/navbar-box-->
                        </div> <!--/navbar-dropdown-->
                    </li>

                    <!-- Single dropdown-->

                    <li>
                        <a href="#">Shop <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown navbar-dropdown-single">
                            <div class="navbar-box">

                                <!-- box-2 (without 'box-1', box-2 will be displayed as full width)-->

                                <div class="box-2">
                                    <div class="box clearfix">
                                        <ul>
                                            <li class="label">Shop</li>
                                            <li><a href="products-grid.html">Products grid</a></li>
                                            <li><a href="products-list.html">Products list</a></li>
                                            <li><a href="category.html">Products intro</a></li>
                                            <li><a href="products-topbar.html">Products topbar</a></li>
                                            <li><a href="product.html">Product overview</a></li>
                                        </ul>
                                        <ul>
                                            <li class="label">Shop Isotope</li>
                                            <li><a href="products-grid-isotope.html">Products filters <span class="label label-warning">New</span></a></li>
                                            <li><a href="products-topbar-isotope.html">Products topbar <span class="label label-warning">New</span></a></li>
                                        </ul>
                                        <ul>
                                            <li class="label">Checkout</li>
                                            <li><a href="checkout-1.html">Checkout - Cart items</a></li>
                                            <li><a href="checkout-2.html">Checkout - Delivery</a></li>
                                            <li><a href="checkout-3.html">Checkout - Payment</a></li>
                                            <li><a href="checkout-4.html">Checkout - Receipt</a></li>
                                        </ul>
                                    </div> <!--/box-->
                                </div> <!--/box-2-->
                            </div> <!--/navbar-box-->
                        </div> <!--/navbar-dropdown-->
                    </li>

                    <!-- Furniture icons in dropdown-->

                    <li>
                        <a href="category.html">Icons <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown">
                            <div class="navbar-box">

                                <!-- box-1 (left-side)-->

                                <div class="box-1">
                                    <div class="image">
                                        <img src="assets/images/blog-2.jpg" alt="Lorem ipsum" />
                                    </div>
                                    <div class="box">
                                        <div class="h2">Best ideas</div>
                                        <div class="clearfix">
                                            <p>Homes that differ in terms of style, concept and architectural solutions have been furnished by Furniture Factory. These spaces tell of an international lifestyle that expresses modernity, research and a creative spirit.</p>
                                            <a class="btn btn-clean btn-big" href="ideas.html">Explore</a>
                                        </div>
                                    </div>
                                </div> <!--/box-1-->

                                <!-- box-2 (right-side)-->

                                <div class="box-2">
                                    <div class="clearfix categories">
                                        <div class="row">

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-sofa"></i>
                                                        <figcaption>Sofa</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-armchair"></i>
                                                        <figcaption>Armchairs</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-chair"></i>
                                                        <figcaption>Chairs</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-dining-table"></i>
                                                        <figcaption>Dining tables</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-media-cabinet"></i>
                                                        <figcaption>Media storage</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-table"></i>
                                                        <figcaption>Tables</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-bookcase"></i>
                                                        <figcaption>Bookcase</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-bedroom"></i>
                                                        <figcaption>Bedroom</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-nightstand"></i>
                                                        <figcaption>Nightstand</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-children-room"></i>
                                                        <figcaption>Children room</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-kitchen"></i>
                                                        <figcaption>Kitchen</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-bathroom"></i>
                                                        <figcaption>Bathroom</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-wardrobe"></i>
                                                        <figcaption>Wardrobe</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-shoe-cabinet"></i>
                                                        <figcaption>Shoe cabinet</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-office"></i>
                                                        <figcaption>Office</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-bar-set"></i>
                                                        <figcaption>Bar sets</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-lightning"></i>
                                                        <figcaption>Lightning</figcaption>
                                                    </figure>
                                                </a>
                                            </div>

                                            <!--icon item-->

                                            <div class="col-sm-3 col-xs-6">
                                                <a href="javascript:void(0);">
                                                    <figure>
                                                        <i class="f-icon f-icon-carpet"></i>
                                                        <figcaption>Carpet</figcaption>
                                                    </figure>
                                                </a>
                                            </div>
                                        </div> <!--/row-->
                                    </div> <!--/categories-->
                                </div> <!--/box-2-->
                            </div> <!--/navbar-box-->
                        </div> <!--/navbar-dropdown-->
                    </li>

                    <!-- Mega menu dropdown -->

                    <li>
                        <a href="#">Megamenu <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown">
                            <div class="navbar-box">
                                <div class="box-2">
                                    <div class="box clearfix">
                                        <div class="row">
                                            <div class="clearfix">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Seating</li>
                                                        <li><a href="javascript:void(0);">Benches</a></li>
                                                        <li><a href="javascript:void(0);">Submenu <span class="label label-warning">New</span></a></li>
                                                        <li><a href="javascript:void(0);">Chaises</a></li>
                                                        <li><a href="javascript:void(0);">Recliners</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Storage</li>
                                                        <li><a href="javascript:void(0);">Bockcases</a></li>
                                                        <li><a href="javascript:void(0);">Closets</a></li>
                                                        <li><a href="javascript:void(0);">Wardrobes</a></li>
                                                        <li><a href="javascript:void(0);">Dressers <span class="label label-success">Trending</span></a></li>
                                                        <li><a href="javascript:void(0);">Sideboards </a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Tables</li>
                                                        <li><a href="javascript:void(0);">Consoles</a></li>
                                                        <li><a href="javascript:void(0);">Desks</a></li>
                                                        <li><a href="javascript:void(0);">Dining tables</a></li>
                                                        <li><a href="javascript:void(0);">Occasional tables</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Chairs</li>
                                                        <li><a href="javascript:void(0);">Dining Chairs</a></li>
                                                        <li><a href="javascript:void(0);">Office Chairs</a></li>
                                                        <li><a href="javascript:void(0);">Lounge Chairs <span class="label label-warning">Offer</span></a></li>
                                                        <li><a href="javascript:void(0);">Stools</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Kitchen</li>
                                                        <li><a href="javascript:void(0);">Kitchen types</a></li>
                                                        <li><a href="javascript:void(0);">Kitchen elements <span class="label label-info">50%</span></a></li>
                                                        <li><a href="javascript:void(0);">Bars</a></li>
                                                        <li><a href="javascript:void(0);">Wall decoration</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Accessories</li>
                                                        <li><a href="javascript:void(0);">Coat Racks</a></li>
                                                        <li><a href="javascript:void(0);">Lazy bags <span class="label label-success">Info</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Beds</li>
                                                        <li><a href="javascript:void(0);">Beds</a></li>
                                                        <li><a href="javascript:void(0);">Sofabeds</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Entertainment</li>
                                                        <li><a href="javascript:void(0);">Wall units <span class="label label-warning">Popular</span></a></li>
                                                        <li><a href="javascript:void(0);">Media sets</a></li>
                                                        <li><a href="javascript:void(0);">Decoration</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--/box-->
                                </div> <!--/box-2-->
                            </div> <!--/navbar-box-->
                        </div> <!--/navbar-dropdown-->
                    </li>

                    <!-- Simple menu link-->

                    <li><a href="shortcodes.html">Shortcodes</a></li>
                </ul>
            </div> <!--/floating-menu-->
        </div> <!--/navigation-main-->

        <!-- ==========  Search wrapper ========== -->

        <div class="search-wrapper">

            <!-- Search form -->
            <input class="form-control" placeholder="Search..." />
            <button class="btn btn-main btn-search">Go!</button>

            <!-- Search results - live search -->
            <div class="search-results">
                <div class="search-result-items">
                    <div class="title h4">Products <a href="#" class="btn btn-clean-dark btn-xs">View all</a></div>
                    <ul>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Green corner</span> <span class="category">Sofa</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Laura</span> <span class="category">Armchairs</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Nude</span> <span class="category">Dining tables</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Aurora</span> <span class="category">Nightstands</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Dining set</span> <span class="category">Kitchen</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Seat chair</span> <span class="category">Bar sets</span></a></li>
                    </ul>
                </div> <!--/search-result-items-->
                <div class="search-result-items">
                    <div class="title h4">Blog <a href="#" class="btn btn-clean-dark btn-xs">View all</a></div>
                    <ul>
                        <li><a href="#"><span class="id">01 Jan</span> <span class="name">Creating the Perfect Gallery Wall </span> <span class="category">Interior ideas</span></a></li>
                        <li><a href="#"><span class="id">12 Jan</span> <span class="name">Making the Most Out of Your Kids Old Bedroom</span> <span class="category">Interior ideas</span></a></li>
                        <li><a href="#"><span class="id">28 Dec</span> <span class="name">Have a look at our new projects!</span> <span class="category">Modern design</span></a></li>
                        <li><a href="#"><span class="id">31 Sep</span> <span class="name">Decorating When You're Starting Out or Starting Over</span> <span class="category">Best of 2017</span></a></li>
                        <li><a href="#"><span class="id">22 Sep</span> <span class="name">The 3 Tricks that Quickly Became Rules</span> <span class="category">Tips for you</span></a></li>
                    </ul>
                </div> <!--/search-result-items-->
            </div> <!--/search-results-->
        </div>

        <!-- ==========  Login wrapper ========== -->

        <div class="login-wrapper">
            <form>
                <div class="h4">Sign in</div>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <a href="#forgotpassword" class="open-popup">Forgot password?</a>
                    <a href="#createaccount" class="open-popup">Don't have an account?</a>
                </div>
                <button type="submit" class="btn btn-block btn-main">Submit</button>
            </form>
        </div>

        <!-- ==========  Cart wrapper ========== -->
        <?php /* ?>
        <div class="cart-wrapper">
            <div class="checkout">
                <div class="clearfix">

                    <!--cart item-->
                    <div class="row">

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/images/product-1.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">Green corner</a></div>
                                <small>Green corner</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="2" class="form-control form-quantity" />
                            </div>
                            <div class="price">
                                <span class="final">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"></span>
                        </div>

                        <!--cart item-->

                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="assets/images/product-4.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">Green corner</a></div>
                                <small>Green corner</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="2" class="form-control form-quantity" />
                            </div>
                            <div class="price">
                                <span class="final">$ 1.998</span>
                                <span class="discount">$ 2.666</span>
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"></span>
                        </div>
                    </div>
                    <hr />

                    <!--cart prices -->
                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                <span>$ 159,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Shipping</strong>
                            </div>
                            <div>
                                <span>$ 30,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>$ 59,00</span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <!--cart final price -->
                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Total</strong>
                            </div>
                            <div>
                                <div class="h4 title">$ 1259,00</div>
                            </div>
                        </div>
                    </div>
                    <!--cart navigation -->
                    <div class="cart-block-buttons clearfix">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="products-grid.html" class="btn btn-clean-dark">Continue shopping</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="checkout-1.html" class="btn btn-main"><span class="icon icon-cart"></span> Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!--/checkout-->
        </div> <!--/cart-wrapper-->
        <?php */?>
    </div> <!--/container-->
</nav>