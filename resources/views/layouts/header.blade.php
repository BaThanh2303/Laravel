<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="/img/language.png" alt="">
                            <div>English</div>
                            <i class="fa-solid fa-chevron-down"></i>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @auth()
                                <a href="#"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                                <form id="form-logout" action="{{route("logout")}}" method="post">
                                    @csrf
                                </form>
                                <a href="javascript:void(0);" onclick="$('#form-logout').submit();">
                                    <i class="fa fa-align-right"></i>Logout</a>
                            @endauth
                            @guest()
                                <a href="{{route("login")}}"><i class="fa fa-user"></i>Login</a>
                                <a href="{{route("register")}}"><i class="fa fa-user"></i>Register</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?= url('/');  ?>"><img src="/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="<?= url('/'); ?>">Home</a></li>
                        <li><a href="<?= url('shop'); ?>">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="<?= url('shop/shop_detail'); ?>">Shop Details</a></li>
                                <li><a href="<?= url('shopping_cart'); ?>">Shoping Cart</a></li>
                                <li><a href="<?= url('checkout'); ?>">Check Out</a></li>
                                <li><a href="<?= url('blog/blog_detail'); ?>">Blog Details</a></li>
                            </ul>
                        </li>
                        <li ><a href="<?= url('blog'); ?>">Blog</a></li>
                        <li><a href="<?= url('contact'); ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{url("/cart")}}"><i class="fa fa-shopping-bag"></i> <span>{{session()->has("cart")?count(session("cart")):0}}</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
