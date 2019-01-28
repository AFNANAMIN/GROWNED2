<!DOCTYPE html>
<html>
<head>
    <?php include('functions.php') ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style1.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="bootstrap.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title></title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>
                        Enter the email you signed up with</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>
            </div>
            <div class="wrap">
                <p class="form-title">
                    Sign In</p>
                <form class="login" method="post" action="login.php"  >
                    <?php echo display_error(); ?>
                <input type="text" placeholder="Username " name="username" />
                <input type="password" placeholder="Password" name="password" />
                <input type="submit" value="Sign In" class="btn btn-success btn-sm" name="login_btn" />
                <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            
                            <a href="register1.php" class="forgot-pass">Sign up</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="posted-by">Posted By: <a href="http://www.jquery2dotnet.com">afnan amin ali</a></div>
</div>


</body>
</html>

<!------ Include the above in your HEAD tag ---------->

