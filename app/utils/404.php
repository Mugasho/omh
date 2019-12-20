<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 8:15 AM
 */

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>404 Error - Page not found</title>

    <!-- Global stylesheets -->
    <link href="<?php echo CONTENT_PATH; ?>global_assets/css/fonts/roboto/roboto.css" rel="stylesheet" media="all">
    <link href="<?php echo CONTENT_PATH; ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet"
          type="text/css">
    <link href="<?php echo ASSETS_PATH; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ASSETS_PATH; ?>css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ASSETS_PATH; ?>css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ASSETS_PATH; ?>css/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ASSETS_PATH; ?>css/colors.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo CONTENT_PATH; ?>global_assets/chill/style.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- /theme JS files -->

</head>

<body class="">


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <div id="world"></div>
            <div id="instructions">
                <h5>We're sorry, but that page can't be found.</h5>
                <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">

                    <!-- Search -->
                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn bg-slate-600 btn-icon btn-lg"><i
                                            class="icon-search4"></i></button>
                            </div>
                        </div>
                    </form>
                    <!-- /search -->


                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="<?php echo BASE_PATH; ?>" class="btn btn-primary btn-block"><i
                                        class="icon-home4 mr-2"></i> Dashboard</a>
                        </div>

                        <div class="col-sm-6">
                            <a href="#" class="btn btn-light btn-block mt-3 mt-sm-0"><i class="icon-menu7 mr-2"></i>
                                Advanced search</a>
                        </div>
                    </div>
                    <!-- /buttons -->

                </div>

                <!-- Error content -->

                <!-- /error wrapper -->
            </div>


        </div>
        <!-- /content area -->


    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<script src="<?php echo CONTENT_PATH; ?>global_assets/chill/three.min.js"></script>
<script src="<?php echo CONTENT_PATH; ?>global_assets/chill/OrbitControls.js"></script>
<script src="<?php echo CONTENT_PATH; ?>global_assets/chill/script.js"></script>
</body>
</html>