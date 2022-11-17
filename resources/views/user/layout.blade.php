<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        type="text/css">
    <link rel="icon" href="{{ asset('admin-assets/dist/img/main/logo-title.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/owl.carousel.min.default.css') }}" />
    @yield('link')
</head>

<body>
    <div id="header">
        <section class="header-container position-fixed">
            <section class="header w-100">
                <nav class="d-flex justify-content-between align-items-center position-relative container-lg">
                    <a href="/">
                        <img src="{{ asset('admin-assets/dist/img/main/Logo.png') }}" alt="Logo"
                            class="header-logo">
                    </a>
                    <div class="search-desktop position-relative">
                        <form action="/search-product" method="GET" enctype="multipart/form-data">
                            <input id="searchInput" type="text" placeholder="Search" name="name" class="w-100">
                            <button type="submit" id="searchBtn"
                                class="btn material-icons-outlined position-absolute p-0 search-icon">
                                search
                            </button>
                        </form>
                    </div>
                    <div class="d-flex">
                        <span class="material-icons-outlined ms-2" id="searchTrigger" data-bs-toggle="collapse"
                            data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                            search
                        </span>
                        <div class="dropdown">
                            <div class="position-relative cart ms-2 ms-lg-3 ms-xxl-0 dropdown-toggle"
                                id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                aria-expanded="false">
                                <span class="material-icons-outlined">
                                    shopping_cart
                                </span>
                                <!-- ProductInCart.length -->
                                @if (Session::has('Cart') != null)
                                    <div class="cart-badge position-absolute">{{ Session::get('Cart')->totalQuanty }}
                                    </div>
                                @else
                                    <div class="cart-badge position-absolute">0</div>
                                @endif
                            </div>
                            <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuClickableInside">
                                <div class="dropdown-item p-0 cart-dropdown" id="change-item-cart">
                                    @if (Session::has('Cart') != null)
                                        @foreach (Session::get('Cart')->products as $item)
                                            <div
                                                class="product-info p-2 p-lg-4 d-flex align-items-center justify-content-between">
                                                <img src="/admin-assets/dist/img/product/{{ $item['productInfo']->img_url }}"
                                                    alt="">
                                                <div class="product-detail px-2 px-md-3">
                                                    <p class="mb-1 mb-md-2">{{ $item['productInfo']->name }}</p>
                                                    <div class="quantity mb-1 mb-md-2">
                                                        <p>x <b>{{ $item['quanty'] }}</b></p>
                                                    </div>
                                                    <div class="price">
                                                        <div class="new-price">
                                                            @isset($sales)
                                                                @foreach ($sales as $sale)
                                                                    @if ($sale->id == $item['productInfo']->sale_id)
                                                                        <span
                                                                            class="new-price">{{ number_format((1 - $sale->percent) * $item['productInfo']->price, 3, '.', ' ') }}đ</span>
                                                                    @endif
                                                                @endforeach
                                                            @endisset

                                                            <div class="old-price">
                                                                {{ number_format($item['productInfo']->price, 3, '.', ' ') }}đ</div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="material-icons-outlined close"
                                                    data-id="{{ $item['productInfo']->id }}">
                                                    delete
                                                </span>
                                            </div>
                                        @endforeach
                                        <div class="select-total px-2">
                                            <span>total:</span>
                                            <h5>{{number_format(Session::get('Cart')->totalPrice, 3, '.', ' ')}}₫</h5>
                                        </div>
                                        <div class="btn-bar-cart w-100 d-flex justify-content-between my-0">
                                            <a href="{{url('/List-Carts')}}" class='btn buy-now w-100'>View Card</a>
                                        </div>
                                    @endif


                                    <div class="btn-bar-cart w-100 d-flex justify-content-between my-0">
                                        <!-- buy-now -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('user'))
                            @foreach (Session::get('user') as $username)
                                <a href="/editProfile/{{ $username }}" class="ms-2 ms-md-3 ms-xxl-5">
                                    <span class="material-icons-outlined">
                                        edit
                                    </span>
                                </a>
                                <a href="admin/logout" class="ms-2 ms-md-3 ms-xxl-5">
                                    <span class="material-icons-outlined">
                                        logout
                                    </span>
                                </a>
                            @endforeach
                        @else
                            <a href="admin/signin" class="ms-2 ms-md-3 ms-xxl-5">
                                <span class="material-icons-outlined">
                                    person_outline
                                </span>
                            </a>
                            <a href="/admin" class="ms-2 ms-md-3 ms-xxl-5">
                                <span class="material-icons-outlined">
                                    edit
                                </span>
                            </a>
                        @endif
                        <span class="material-icons-outlined ms-2 trigger-mb-menu" data-bs-toggle="collapse"
                            data-bs-target="#collapseNav" aria-expanded="false" aria-controls="collapseNav">
                            menu
                        </span>
                    </div>
                    <div class="position-absolute collapse" id="collapseNav">
                        <div>
                            <a href="#/!">
                                HOME
                            </a>
                            <div class="d-flex justify-content-between">
                                <a href="#!Product-category">PRODUCT</a>
                                <!-- <span class="material-icons-outlined" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSubMenuLev1" aria-expanded="false"
                                    aria-controls="collapseSubMenuLev1">expand_more</span> -->
                            </div>
                            <div id="collapseSubMenuLev1" class="collapse ms-3">
                                <div class="d-flex justify-content-between">
                                    <a href="">BULB</a>
                                    <span class="material-icons-outlined" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSubMenuLev2-1" aria-expanded="false"
                                        aria-controls="collapseSubMenuLev2-1">expand_more</span>
                                </div>
                                <div class="collapse collapseSubMenuLev2 ms-3" id="collapseSubMenuLev2-1">
                                    <a href="">Wisteria Lane</a>
                                    <a href="">BetUS</a>
                                    <a href="">BTMWAY</a>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="">SPOT LIGHT</a>
                                    <span class="material-icons-outlined" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSubMenuLev2-1" aria-expanded="false"
                                        aria-controls="collapseSubMenuLev2-1">expand_more</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="">SMART LIGHT</a>
                                    <span class="material-icons-outlined" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSubMenuLev2-1" aria-expanded="false"
                                        aria-controls="collapseSubMenuLev2-1">expand_more</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="">DECORATION LIGHT</a>
                                    <span class="material-icons-outlined" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSubMenuLev2-1" aria-expanded="false"
                                        aria-controls="collapseSubMenuLev2-1">expand_more</span>
                                </div>
                            </div>
                            <a class="" href="#!Sales">SALES</a>
                            <a class="" href="#!Contact">CONTACT</a>
                            <a class="" href="#!About">ABOUT</a>
                        </div>
                    </div>
                    <div class="position-absolute collapse w-100 px-3 py-2 search-mobile" id="collapseSearch">
                        <div class="position-relative">
                            <a href="#!Product-category" class="material-icons-outlined ms-2 position-absolute">
                                search
                            </a>
                            <input type="text" placeholder="Search" class="w-100">
                        </div>
                    </div>
                </nav>
            </section>
            <hr class="my-0">
            <nav class="sub-menu">
                <div
                    class="d-flex justify-content-around align-items-center container-lg sub-menu-layout position-relative">
                    <a href="#/!"class="active">HOME</a>
                    <span>
                        <div class="d-flex align-items-center">
                            <!-- <a href="#!Product-category" class="me-2">PRODUCT+</a> -->
                            <div class="dropdown">
                                <button class="btn dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    BRAND
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @isset($brands)
                                        @foreach ($brands as $brand)
                                            <li><a class="dropdown-item"
                                                    href="/homepage/brand/{{ $brand->id }}">{{ $brand->full_name }}</a>
                                            </li>
                                        @endforeach
                                    @endisset

                                </ul>
                            </div>
                            <!-- <span class="material-icons-outlined" data-bs-toggle="collapse"
                                data-bs-target="#collapseSubMenuLev1Desktop" aria-expanded="false"
                                aria-controls="collapseSubMenuLev1Desktop">expand_more</span> -->
                        </div>
                        <div class="position-absolute collapse" id="collapseSubMenuLev1Desktop">
                            <div class="d-flex justify-content-between position-relative">
                                <a href="">BULB</a>
                                <span class="material-icons-outlined" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSubMenuLev2Desktop-1" aria-expanded="false"
                                    aria-controls="collapseSubMenuLev2Desktop-1">chevron_right</span>
                                <div class="collapse position-absolute collapseSubMenuLev2Desktop"
                                    id="collapseSubMenuLev2Desktop-1">
                                    <a href="">Wisteria Lane</a>
                                    <a href="">BetUS</a>
                                    <a href="">BTMWAY</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="">SPOT LIGHT</a>
                                <span class="material-icons-outlined" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSubMenuLev2-2" aria-expanded="false"
                                    aria-controls="collapseSubMenuLev2-2">chevron_right</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="">SMART LIGHT</a>
                                <span class="material-icons-outlined" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSubMenuLev2-3" aria-expanded="false"
                                    aria-controls="collapseSubMenuLev2-3">chevron_right</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="">DECORATION LIGHT</a>
                                <span class="material-icons-outlined" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSubMenuLev2-4" aria-expanded="false"
                                    aria-controls="collapseSubMenuLev2-4">chevron_right</span>
                            </div>
                        </div>
                    </span>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            COUNTRY
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @isset($countries)


                                @foreach ($countries as $country)
                                    <li><a class="dropdown-item"
                                            href="/homepage/country/{{ $country->id }}">{{ $country->full_name }}</a>
                                    </li>
                                @endforeach
                            @endisset

                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            CATALOGUE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <div class="btn-group dropend">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    SHAPE
                                </button>
                                <ul class="dropdown-menu">
                                    @isset($shapes)

                                        @foreach ($shapes as $shape)
                                            <li><a class="dropdown-item"
                                                    href="/homepage/shape/{{ $shape->id }}">{{ $shape->shape_desc }}</a>
                                            </li>
                                        @endforeach
                                    @endisset

                                </ul>
                            </div>
                            <div class="btn-group dropend">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    TYPE
                                </button>
                                <ul class="dropdown-menu">
                                    @isset($types)

                                        @foreach ($types as $type)
                                            <li><a class="dropdown-item"
                                                    href="/homepage/type/{{ $type->id }}">{{ $type->description }}</a>
                                            </li>
                                        @endforeach
                                    @endisset

                                </ul>
                            </div>
                            <div class="btn-group dropend">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    WATT
                                </button>
                                <ul class="dropdown-menu">
                                    @isset($watts)

                                        @foreach ($watts as $watt)
                                            <li><a class="dropdown-item"
                                                    href="/homepage/watt/{{ $watt->id }}">{{ $watt->measure }}</a>
                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section class="space"></section>
        <section>
            @yield('content')
        </section>
        <section class="footer" id="footer">
            <div class="subscribe d-flex align-items-center justify-content-center position-relative">
                <!-- <img src="./imgs/subscribe.png" alt="" class="w-100 position-absolute"> -->
                <img src="{{ asset('admin-assets/dist/img/main/subscribe.png') }}" alt=""
                    class="w-100 position-absolute">
                <form class="d-flex flex-column align-items-center">
                    <h1>SUBSCRIBE TO NEWSLETTER</h1>
                    <div class="position-relative w-100">
                        <input class="w-100" type="text" placeholder="Enter your email"
                            pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                        <span class="material-icons-outlined position-absolute">
                            email
                        </span>
                    </div>
                    <button class="w-100 mt-3">Subscribe</button>
                </form>
            </div>
            <div class="information">
                <div class="container-lg">
                    <div class="row py-3">
                        <div class="col-lg-4 mb-4">
                            <!-- Loop Address list -->
                            <!-- address.branchName -->
                            <h1>Ha Noi</h1>
                            <div class="d-flex mb-2">
                                <span class="material-icons-outlined me-3">
                                    location_on
                                </span>
                                <!-- address.address -->
                                <span class="text-justify">so 8 Hang Khay</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span class="material-icons-outlined me-3">
                                    email
                                </span>
                                <!-- address.emai -->
                                <a href="mailto:brightworld@gmail.com">brightworld@gmail.com</a>
                            </div>
                            <div class="d-flex mb-2">
                                <span class="material-icons-outlined me-3">
                                    phone_in_talk
                                </span>
                                <!-- address.phone1 -->
                                <a href="tel:(84.28) 3863 3594">(84.28) 3863 3594 </a>
                                <span>-</span>
                                <!-- address.phone2 -->
                                <a href="tel:(84.28) 3863 4270">(84.28) 3863 4270</a>
                            </div>
                            <div class="d-flex mb-2">
                                <span class="material-icons-outlined me-3">
                                    print
                                </span>
                                <!-- address.fax -->
                                <span>(84.28) 3863 4270 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top function -->
            <button id="myBtn" title="Go to top" class="up-to-top btn">
                <span class="material-icons-outlined">
                    north
                </span>
            </button>
    </div>
    <div class="text-center py-2">
        &copy Copyright by Group1
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin-assets/dist/js/owl.carousel.min.js') }}"></script>


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <script>
        const scrollToTopBtn = document.getElementById('myBtn')
        scrollToTopBtn.addEventListener("click", scrollToTop)

        function scrollToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        const searchInput = document.getElementById('searchInput').value;

        function searchProduct() {
            console.log({
                searchInput
            })
            if (searchInput) {
                // window.location.href = `http://127.0.0.1:8000/search/${searchInput}`;
                console.log("/search")
            } else {
                return;
            }
        }
    </script>
    <script>
        $("#change-item-cart").on("click", ".material-icons-outlined", function() {
            $.ajax({
                url: 'Delete-Item-Cart/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Đã xóa sản phẩm');
                setTimeout(function() {
                    location.reload();
                }, 600);
            });
        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
        }
    </script>
    @yield('script')
</body>

</html>
