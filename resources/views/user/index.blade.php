<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    <link rel="stylesheet" href="owl.carousel.min.css">
    <link rel="stylesheet" href="owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/main.css') }}" />
</head>
<body>
<div id="header">
        <section class="header-container position-fixed">
            <section class="header w-100">
                <nav class="d-flex justify-content-between align-items-center position-relative container-lg">
                    <a href="#/!">
                        <img src="{{ asset('admin-assets/dist/img/main/Logo.png') }}" alt="Logo" class="header-logo">
                    </a>
                    <div class="search-desktop position-relative">
                        <input type="text" placeholder="Search" class="w-100">
                        <a href="#!Product-category" class="btn material-icons-outlined position-absolute p-0 search-icon">
                            search
                        </a>
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
                                <div class="cart-badge position-absolute">5</div>
                            </div>
                            <div class="dropdown-menu p-0" aria-labelledby="dropdownMenuClickableInside">
                                <div class="dropdown-item p-0 cart-dropdown">
                                  <div class="product-info p-2 p-lg-4 d-flex align-items-center justify-content-between">
                                      <!-- For loop Cart list -->
                                      <!-- img-product.imageUrl -->
                                        <div class="product-detail px-2 px-md-3">
                                            <!-- product.name -->
                                            <p class="mb-1 mb-md-2">Den led</p>
                                            <!-- product.productQuantity -->
                                            <div class="quantity mb-1 mb-md-2">
                                                x1
                                            </div>
                                            <div class="price">
                                                <div class="new-price">5</div>
                                                <div class="old-price">10</div>
                                                <!-- product.newPrice -->
                                                <!-- product.oldPrice -->
                                            </div>
                                        </div>
                                        <span class="material-icons-outlined close">
                                            delete
                                        </span>
                                    </div>
                                    <div class="btn-bar-cart w-100 d-flex justify-content-between my-0">
                                        <!-- buy-now -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="./Signin/signin.html" class="ms-2 ms-md-3 ms-xxl-5">
                            <span class="material-icons-outlined">
                                person_outline
                            </span>
                        </a>
                        <span class="material-icons-outlined ms-2 trigger-mb-menu" data-bs-toggle="collapse"
                            data-bs-target="#collapseNav" aria-expanded="false" aria-controls="collapseNav">
                            menu
                        </span>
                    </div>
                    <div class="position-absolute collapse" id="collapseNav">
                        <div>
                            <a href="#/!" class="active">
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
                            <a href="#!Product-category" class="me-2">PRODUCT</a>
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
                    <a class="#!Sales" href="#!Sales">SALES</a>
                    <a class="#!Contact" href="#!Contact">CONTACT</a>
                    <a class="#!About" href="#!About">ABOUT</a>
                </div>
            </nav>
        </section>
        <section class="space"></section>
        <section>
            <!-- <ng-view></ng-view> -->
            <!-- Body -->
            Hello World
        </section>
        <section class="footer" id="footer">
            <div class="subscribe d-flex align-items-center justify-content-center position-relative">
                <!-- <img src="./imgs/subscribe.png" alt="" class="w-100 position-absolute"> -->
                <img src="{{ asset('admin-assets/dist/img/main/subscribe.png') }}" alt="" class="w-100 position-absolute">
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
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <scriptpr type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></scriptpr>
</body>
</html>