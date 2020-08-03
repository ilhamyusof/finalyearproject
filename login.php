<?php
require_once './library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';
if (isset($_POST['name']) && isset($_POST['pwd'])) {
	$result = doLogin();
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>

    <!DOCTYPE html>
    <html>

    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo WEB_ROOT;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo WEB_ROOT;?>dist/css/AdminLTE.css">

        <link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

        <link href="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body,
            html {
                height: 100%;
                margin: 0;
                overflow: hidden;
            }

            a {
                color: #92badd;
                display: inline-block;
                text-decoration: none;
                font-weight: 400;
            }

            h2 {
                text-align: center;
                font-size: 16px;
                font-weight: 600;
                text-transform: uppercase;
                display: inline-block;
                margin: 40px 8px 10px 8px;
                color: #cccccc;
            }



            /* STRUCTURE */

            .wrapper {
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                width: 100%;
                min-height: 100%;
                padding: 20px;
            }

            #formContent {
                -webkit-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
                background: #fff;
                padding: 30px;
                width: 90%;
                max-width: 450px;
                position: relative;
                padding: 0px;
                -webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
                box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
                text-align: center;
            }

            #formFooter {
                background-color: #f6f6f6;
                border-top: 1px solid #dce8f1;
                padding: 25px;
                text-align: center;
                -webkit-border-radius: 0 0 10px 10px;
                border-radius: 0 0 10px 10px;
            }



            /* TABS */

            h2.inactive {
                color: #cccccc;
            }

            h2.active {
                color: #0d0d0d;
                border-bottom: 2px solid #5fbae9;
            }



            /* FORM TYPOGRAPHY*/

            input[type=button],
            input[type=submit],
            input[type=reset] {
                background-color: #56baed;
                border: none;
                color: white;
                padding: 15px 80px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                text-transform: uppercase;
                font-size: 13px;
                -webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
                box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
                -webkit-border-radius: 5px 5px 5px 5px;
                border-radius: 5px 5px 5px 5px;
                margin: 5px 20px 40px 20px;
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -ms-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            input[type=button]:hover,
            input[type=submit]:hover,
            input[type=reset]:hover {
                background-color: #39ace7;
            }

            input[type=button]:active,
            input[type=submit]:active,
            input[type=reset]:active {
                -moz-transform: scale(0.95);
                -webkit-transform: scale(0.95);
                -o-transform: scale(0.95);
                -ms-transform: scale(0.95);
                transform: scale(0.95);
            }

            input[type=text] {
                background-color: #f6f6f6;
                border: none;
                color: #0d0d0d;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 5px;
                width: 85%;
                border: 2px solid #f6f6f6;
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                -ms-transition: all 0.5s ease-in-out;
                -o-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
                -webkit-border-radius: 5px 5px 5px 5px;
                border-radius: 5px 5px 5px 5px;
            }

            input[type=text]:focus {
                background-color: #fff;
                border-bottom: 2px solid #5fbae9;
            }

            input[type=text]:placeholder {
                color: #cccccc;
            }
            
            input[type=password] {
                background-color: #f6f6f6;
                border: none;
                color: #0d0d0d;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 5px;
                width: 85%;
                border: 2px solid #f6f6f6;
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                -ms-transition: all 0.5s ease-in-out;
                -o-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
                -webkit-border-radius: 5px 5px 5px 5px;
                border-radius: 5px 5px 5px 5px;
            }

            input[type=password]:focus {
                background-color: #fff;
                border-bottom: 2px solid #5fbae9;
            }

            input[type=password]:placeholder {
                color: #cccccc;
            }



            /* ANIMATIONS */

            /* Simple CSS3 Fade-in-down Animation */

            .fadeInDown {
                -webkit-animation-name: fadeInDown;
                animation-name: fadeInDown;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            @-webkit-keyframes fadeInDown {
                0% {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100%, 0);
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    opacity: 1;
                    -webkit-transform: none;
                    transform: none;
                }
            }

            @keyframes fadeInDown {
                0% {
                    opacity: 0;
                    -webkit-transform: translate3d(0, -100%, 0);
                    transform: translate3d(0, -100%, 0);
                }
                100% {
                    opacity: 1;
                    -webkit-transform: none;
                    transform: none;
                }
            }

            /* Simple CSS3 Fade-in Animation */

            @-webkit-keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            @-moz-keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            .fadeIn {
                opacity: 0;
                -webkit-animation: fadeIn ease-in 1;
                -moz-animation: fadeIn ease-in 1;
                animation: fadeIn ease-in 1;

                -webkit-animation-fill-mode: forwards;
                -moz-animation-fill-mode: forwards;
                animation-fill-mode: forwards;

                -webkit-animation-duration: 1s;
                -moz-animation-duration: 1s;
                animation-duration: 1s;
            }

            .fadeIn.first {
                -webkit-animation-delay: 0.4s;
                -moz-animation-delay: 0.4s;
                animation-delay: 0.4s;
            }

            .fadeIn.second {
                -webkit-animation-delay: 0.6s;
                -moz-animation-delay: 0.6s;
                animation-delay: 0.6s;
            }

            .fadeIn.third {
                -webkit-animation-delay: 0.8s;
                -moz-animation-delay: 0.8s;
                animation-delay: 0.8s;
            }

            .fadeIn.fourth {
                -webkit-animation-delay: 1s;
                -moz-animation-delay: 1s;
                animation-delay: 1s;
            }

            /* Simple CSS3 Fade-in Animation */

            .underlineHover:after {
                display: block;
                left: 0;
                bottom: -10px;
                width: 0;
                height: 2px;
                background-color: #56baed;
                content: "";
                transition: width 0.2s;
            }

            .underlineHover:hover {
                color: #0d0d0d;
            }

            .underlineHover:hover:after {
                width: 100%;
            }



            /* OTHERS */

            *:focus {
                outline: none;
            }

            #icon {
                width: 60%;
            }


            .bg {
                /* The image used */
                background-image: url("../event-management/dist/img/newbg3.png");

                /* Full height */
                height: 100%;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;



            }

        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body class="hold-transition bg">
        <div class="login-box "><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="login-logo ">
                <a href="#" class="bg-warning" style="color:#000000 "><b></b></a>
            </div>
            <!-- /.login-logo -->

            <?php if($errorMessage != "&nbsp;" ) {?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?php echo $errorMessage; ?>
            </div>
            <?php } ?>

            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->

                    <!-- Icon -->


                    <!-- Login Form -->
                    <form action="" method="post">
                        <div>
                            <span id="sprytf_name"> 
           <input type="text" id="login" class="fadeIn second" name="name" placeholder="Username">
                            <span class="textfieldRequiredMsg">Username is required.</span>
                            <span class="textfieldMinCharsMsg">Username must specify at least 4 characters.</span>
                            </span>

                        </div>
                        <div>
                            <span id="sprytf_pwd"> 
                                <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="Password"><br>

                            <span class="passwordRequiredMsg">Password is required.</span>
                            <span class="passwordMinCharsMsg">You must specify at least 6 characters.</span>
                            <span class="passwordMaxCharsMsg">You must specify at max 10 characters.</span>
                            </span>

                        </div>





                        <input type="submit" class="fadeIn fourth" value="Log In">
                    </form>

                    <!-- Remind Passowrd -->


                </div>
            </div>




            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

    </body>
    <script>
        
        var sprytf_name = new Spry.Widget.ValidationTextField("sprytf_name", "none", {
            minChars: 4,
            validateOn: ["blur", "change"]
        });
        var sprytf_pwd = new Spry.Widget.ValidationPassword("sprytf_pwd", {
            minChars: 4,
            maxChars: 12,
            validateOn: ["blur", "change"]
        });


    </script>

    </html>
