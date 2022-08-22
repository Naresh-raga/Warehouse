<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo e(asset('webc/assets/images/favicon.png')); ?>" type="image/gif" sizes="16x16" />
    <title>ILSE India Logistic Storage & Warehouse Exchange</title>
    <link href="<?php echo e(asset('webc/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('webc/assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('webc/assets/css/responsive.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(asset('webc/assets/css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('webc/assets/css/owl.theme.default.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('webc/assets/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
</head>

<body id="animsition">
    <div class="modal fade search-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <input type="text" value="" name="" placeholder="TYPE YOUR SEARCH KEYWORD"/>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <header>
       <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="top-social">
                        <ul>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="top-header-right text-end">
                        <p>Opening Hours : Monday - Saturday 9 am to 6 pm</p>
                    </div>
                </div>
            </div>
        </div>
       </div>
       <div class="navigation-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col">
                    <div class="logo-wrapper">
                        <div class="logo-wrapper-inner">
                           <a href="index.html">
                                 <img src="<?php echo e(asset('webc/assets/images/logo.webp')); ?>" alt="logo" height="120" width="175" />
                           </a>
                        </div>
                     </div>
                </div>
                <div class="col-lg-9 col">
                    <div class="support-bar">
                        <div class="row">
                           <div class="offset-xl-2 col-xl-10 offset-2 col-10">
                              <div class="row">
                                 <div class="col-lg-3">
                                    <div class="support-info">
                                       <div class="left-content">
                                        <img src="<?php echo e(asset('webc/assets/images/phone-call.webp')); ?>" alt="phone-call" height="30" width="30" />
                                       </div>
                                       <div class="right-content">
                                          <div class="right-content-inner">
                                            <h5>Free Call</h5>
                                            <p>
                                                <a href="tel:09738608232">097386-08232</a>
                                            </p> 
                                            </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="support-info">
                                       <div class="left-content">
                                        <img src="<?php echo e(asset('webc/assets/images/mail-open.webp')); ?>" alt="mail-open" height="30" width="30" />
                                       </div>
                                       <div class="right-content">
                                          <h5>Mail us</h5>
                                          <p>
                                            <a href="mailto:info@indialogisticstorageexchange.com">info@indialogisticstorageexchange.com</a>
                                          </p>
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-lg-3 text-end">
                                    <?php if(Auth::check()): ?>
                                        <?php if(Auth::user()->role_id == 2): ?>
                                            <a href="<?php echo e(route('manager.home')); ?>" class="boxed-btn btn-main"><span>My Account</span></a>
                                        <?php else: ?>
                                            <a href="" class="boxed-btn btn-main"><span>My Account</span></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="boxed-btn btn-main"><span>login</span></a>
                                    <?php endif; ?>
                                 </div>
                                </div>
                           </div>
                        </div>
                     </div>
                     <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary main-navigation" id="navbar">
                        <a class="navbar-brand" href="index.html">
                            <img src="<?php echo e(asset('webc/assets/images/logo.webp')); ?>" alt="logo" height="120" width="175" />
                        </a>
                        <button class="navbar-toggler" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="overlay d-flex d-lg-none"></div>
                        <div class="order-lg-2 bg-primary d-lg-flex w-100 sidebar pb-3 pb-lg-0">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link px-3 px-lg-2 active" aria-current="page" href="index.html">
                                        Home 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 px-lg-2" href="#services">
                                        SERVICES
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 px-lg-2" href="#aboutus">
                                        ABOUT US
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link px-3 px-lg-2" href="blog.html">
                                        BLOG
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 px-lg-2" href="contact.html">
                                        CONTACT
                                    </a>
                                </li>
                            </ul>
                            <div class="d-flex ms-auto">
                                <a href="javascript:void(0)" class="search-bx" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
       
       </div>
    </header>
    <?php if($errors->any()): ?>
        <div class="container mt-4">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger alert-dismissible fade show"><?php echo e($error); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <?php if(session()->has('error')): ?>
        <div class="container mt-4">
            <div class="alert alert-danger alert-dismissible fade show">
                <?php echo e(session()->get('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <?php if(session()->has('success')): ?>
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo e(session()->get('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer-logo">
                        <img src="<?php echo e(asset('webc/assets/images/logo.webp')); ?>" height="120" width="175" />
                    </div>
                    <div class="top-social">
                        <ul>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank"><i class="fab fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer-head">
                        <h4>Useful Links</h4>
                    </div>
                    <ul class="footer-links">
                        <li>
                            <a href="index.html">
                                Home 
                            </a>
                        </li>
                        <li>
                            <a href="about-us.html">
                                ABOUT US
                            </a>
                        </li>
                        <li>
                            <a href="blog.html">
                                BLOG
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                CONTACT
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer-head">
                        <h4>Services</h4>
                    </div>
                    <ul class="footer-links">
                        <li><a href="warehousing-consultaion.html"> WAREHOUSING CONSULTATION </a></li>
                        <li><a href="scheduled-shipping.html"> SCHEDULED SHIPPING </a></li>
                        <li>
                            <a href="customer-service-call.html"> CUSTOMER SERVICE CALL </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer-head">
                        <h4>Contact us</h4>
                    </div>
                    <div class="footer-contact">
                        <div class="contact-info">
                            <div class="icon-wrapper">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <p>
                                <a href="#">Office Address: F-301, Ashish JK Apartment, Thubarahali Extension, Bangalore- 560066 
                                
                                </a>
                            </p>
                        </div>
                        <div class="contact-info">
                            <div class="icon-wrapper">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <p>
                                <a href="#">
                                Branch Office: 242, Second Floor, Satra Plaza, Phase 2, Sector 19D, Vashi, Navi Mumbai, 400703
                                </a>
                            </p>
                        </div>
                        <div class="contact-info">
                            <div class="icon-wrapper">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <p>
                                <a href="tel:9738608232">097386-08232</a>
                            </p>
                        </div>
                        <div class="contact-info">
                            <div class="icon-wrapper">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <p>
                                <a href="mailto:info@indialogisticstorageexchange.com">info@indialogisticstorageexchange.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="copyright">
                        <p class="text-center">© Copyrights 2022 ILSE India Logistic Storage Exchange.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a id="button-top" class="show">
        <i class="fas fa-angle-up"></i>
    </a>
    <!------ Footer ---------->
    <!------Jquery min js---->
    <script src="<?php echo e(asset('webc/assets/js/jquery.min.js')); ?>" type="text/javascript"></script>

    <!------Proper min js---->
    <script src="<?php echo e(asset('webc/assets/js/popper.min.js')); ?>" type="text/javascript"></script>

    <!------Bootstrap min js---->
    <script src="<?php echo e(asset('webc/assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>

    <!------Owl carousel slider js---->
    <script src="<?php echo e(asset('webc/assets/js/owl.carousel.js')); ?>" type="text/javascript"></script>

    <!------All Script---->
    <script src="<?php echo e(asset('webc/assets/js/script.js')); ?>" type="text/javascript"></script>
</body>
</html><?php /**PATH C:\wamp64\www\wms\resources\views/layouts/app.blade.php ENDPATH**/ ?>