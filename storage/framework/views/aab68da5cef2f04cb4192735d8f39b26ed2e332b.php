<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/cs-skin-elastic.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
  rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        .outerDivFull { display: inline-block; } 

.switchToggle input[type=checkbox]{height: 0; width: 0; visibility: hidden; position: absolute; }
.switchToggle label {cursor: pointer; text-indent: -9999px; width: 100px; max-width:100px; height: 30px; background: #dc3545;; display: block; border-radius: 100px; position: relative; }
.switchToggle label:after {content: ''; position: absolute; top: 2px; left: 2px; width: 26px; height: 26px; background: #fff; border-radius: 90px; transition: 0.3s; }
.switchToggle input:checked + label, .switchToggle input:checked + input + label  {background: #28a745; }
.switchToggle input + label:before, .switchToggle input + input + label:before {content: 'Inactive'; position: absolute; top: 3px; left: 35px; width: 60px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:before, .switchToggle input:checked + input + label:before {content: 'Active'; position: absolute; top: 3px; left: 17px; width: 60px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:after, .switchToggle input:checked + input + label:after {left: calc(100% - 2px); transform: translateX(-100%); }
.switchToggle label:active:after {width: 60px; } 
.toggle-switchArea { margin: 10px 0 10px 0; }
    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <?php if(\Auth::user()->role_id == 1): ?>
                        <li class="">
                            <a href="<?php echo e(url('admin/home')); ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('cms-pages.index')); ?>"><i class="menu-icon fa fa-cogs"></i>Pages </a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('blog.index')); ?>"><i class="menu-icon fa fa-window-restore"></i>Manage Blogs</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('etemplate.index')); ?>"><i class="menu-icon fa fa-envelope"></i>Email Templates</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('roles.index')); ?>"><i class="menu-icon fa fa-road"></i>Roles</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('permission.edit',[1])); ?>"><i class="menu-icon fa fa-podcast"></i>Permission</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('category.index')); ?>"><i class="menu-icon fa fa-snowflake-o"></i>Category</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('users.index')); ?>"><i class="menu-icon fa fa-users"></i>Users</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('product-types.index')); ?>"><i class="menu-icon fa fa-product-hunt"></i>Product Types</a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('warehouse.index')); ?>"><i class="menu-icon fa fa-home"></i>Warehouses</a>
                        </li>
                    <?php endif; ?>
                    <?php if(\Auth::user()->role_id == 2): ?>
                        <li class="">
                            <a href="<?php echo e(url('manager/home')); ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="">
                            <a href="<?php echo e(route('warehouse.index')); ?>"><i class="menu-icon fa fa-home"></i>Warehouses</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('logo_short.png')); ?>" alt="Logo">
                        <!-- <h1><b>WMS</b></h1> -->
                    </a>
                    <a class="navbar-brand hidden" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/logo2.png')); ?>" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo e(asset('images/avatar/1.jpg')); ?>"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo e(asset('images/avatar/2.jpg')); ?>"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo e(asset('images/avatar/3.jpg')); ?>"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="<?php echo e(asset('images/avatar/4.jpg')); ?>"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo e(asset('images/admin.jpg')); ?>" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>--->
                            <?php if(\Auth::user()->role_id == 2): ?>
                                <a class="nav-link" href="<?php echo e(route('manager.edit.profile')); ?>"><i class="fa fa -cog"></i>Edit Profile</a>
                            <?php endif; ?>
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger"><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('error')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('success')); ?>

                    </div>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <!-- <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer> -->
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/lib/data-table/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/lib/data-table/buttons.colVis.min.js')); ?>"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
    
    <script>
        var dt = {
            'cms': "<?php echo e(route('cms-pages.index')); ?>",
            'blog': "<?php echo e(route('blog.index')); ?>",
            'et': "<?php echo e(route('etemplate.index')); ?>",
            'role': "<?php echo e(route('roles.index')); ?>",
            'cat': "<?php echo e(route('category.index')); ?>",
            'testimonial': "<?php echo e(route('testimonial.index')); ?>",
            'users': "<?php echo e(route('users.index')); ?>",
            'pt': "<?php echo e(route('product-types.index')); ?>",
            'wh': "<?php echo e(route('warehouse.index')); ?>",
            'ft': "<?php echo e(route('food-type.index')); ?>",
        };

        $("input[type='file']").change(function () {
            filePreview(this,$(this));
        });

        function filePreview(input,x) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    x.parents('.pp').find('img').attr('src',e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        if($('#description').length>0){
            CKEDITOR.replace('description', {});
        }
        function updates(v) {
            $.get("<?php echo e(url('admin/ckc')); ?>",{'model':v.attr('data-model'),'id':v.attr('data-id')},function(){});
        };
    </script>
    <script src="<?php echo e(asset('assets/js/data-table-init.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\wamp64\www\wms\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>