<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="p:domain_verify" content="02140eebd8836c8b797748838529619d" />
    <title>FertigHausWelt-Login</title>

    <!--favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="http://www.fertighauswelt.de/images/tpl/favicon.ico" />

    <!--[if IE 6]>
    <style type="text/css" media="screen">
        body { behavior: url(<?php echo getAssetsURL(); ?>/css/csshover.htc); }
    </style>
    <![endif]-->

    <!-- CSS -->
    <link href="<?php echo getAssetsURL(); ?>/css/fertighauswelt.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<link href="css/bootstrap-3.3.7.min.css" rel="stylesheet" type="text/css" />-->
    <link href="<?php echo getAssetsURL(); ?>/css/login.css" rel="stylesheet" type="text/css" />
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
<div id="login-container" class="container-fluid">
    <div class="col-lg-6 well text-center" id="form-container">
        <img src="<?php echo getAssetsURL(); ?>/images/tpl/fertighauswelt-logo.png" alt="FertigHausWelt Logo" id="form-img">

        <!-- LOGIN FORM --->
        <form id="loginForm" action="" method="post">
            <!--<h2 style="border-bottom: 1px solid #666666; padding-bottom: 10px; background: url(./images/tpl/mitglieder-icon.png) 0 -5px no-repeat;">Mitglieder-Login</h2>-->
            <div class="form-group form-group-sm">

                <!-- select branch -->
                <select id="filien" class="form-control"name="branch_id" required>
                    <option value="0"><?php echo convertToUTF8("Filiale auswählen") ?></option>
                    <?php
                    foreach($branches as $branch){
                        $br = htmlspecialchars($branch->branch);
                        $branch_id = (int)$branch->id;
                        @$options .= "<option value='$branch_id'>$br</option>";
                    }
                    echo $options;
                    ?>
                </select>
                <!-- /select branch -->

            </div>
            <div class="form-group form-group-sm">
                <input type="password" placeholder="Passwort" id="password" name="password" class="form-control" required>
                <span style="color:red"><?php echo convertToUTF8(@$login_error_msg); ?></span>
            </div>
            <div class="form-group form-group-sm">
                <input type="submit" name="login" class="btn btn-default pull-right" value="Anmeldung" id="btn-login"><br>
            </div>
        </form>
        <br>
        <!--- /LOGIN FORM --->

        <br>
        <div style="font-size:10px;padding-top:5px; text-align: left">Loggen sie sich mit den Ihnen bekannten Filialdaten
            ein.
        </div>
    </div>
</div>

</body>
</html>