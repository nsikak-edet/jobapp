<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adio Consultancy</title>

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
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo getAssetsURL(); ?>/assets/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse" style="background:#2196F3">
    <div class="navbar-header">
        <h3 style="margin-top:5px;margin-left:30px;">Adio Consultancy</h3>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">

        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Simple login form -->
                <form method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class=""><hr><br></div>
                            <h5 class="content-group">Admin Login <small class="display-block">Enter admin credentials below</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <div class="text-danger"><?php echo form_error('username') ?></div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <div class="text-danger"><?php echo form_error('password') ?><?php echo @$invalid_details; ?></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                    </div>
                </form>
                <!-- /simple login form -->


                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; <?php echo date('Y'); ?> <a href="#">Adio Consultancy</a> All rights reserved
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
