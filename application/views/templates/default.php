<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adio Consultancy <?php echo $page_title; ?></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo getAssetsURL(); ?>/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo getAssetsURL(); ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo getAssetsURL(); ?>/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo getAssetsURL(); ?>/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo getAssetsURL(); ?>/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/forms/editable/editable.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/core/app.js"></script>

<!--    <script type="text/javascript" src="--><?php //echo getAssetsURL(); ?><!--/assets/js/pages/dashboard.js"></script>-->
    <!-- /theme JS files -->
</head>
<body>

<!-- Main navbar -->
<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url() ?>"></a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <?php $ci= get_instance();
                            $user = $ci->session->userdata('user');

                    if($user != null): ?>

                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span>Administrator</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="<?php echo base_url() ?>app/applicants"><i class="icon-users"></i> Applications</a></li>
                        <li><a href="<?php echo base_url() ?>account/logout"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <!-- Main -->
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
        </div>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"><?php echo @$page_title; ?></span></h4>
                    </div>
                    <div class="heading-elements">
                        <div class="heading-btn-group">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

                <!-- Form horizontal -->
                <?php echo $body ?>
                <!-- /form horizontal -->

                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; <?php echo date('Y'); ?> <a href="#">Adio Consultancy</a>. All rights reserved
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
</body>
</html>
