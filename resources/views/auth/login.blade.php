<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        

        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap 5 Dashboard Template" />
        <meta name="author" content="BootstrapDash" />

        <title>Scale</title>

        <!-- vendor css -->
        <link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet" />
        <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
        <link href="/lib/typicons.font/typicons.css" rel="stylesheet" />

        <!-- azia CSS -->
        <link rel="stylesheet" href="/css/azia.css" />
    </head>
    <body class="az-body">
        <div class="az-signin-wrapper">
            <div class="az-card-signin">
                <h1 class="az-logo">
                    <img src="https://neip.gov.gh/images/a-100.jpg" alt="">
                </h1>
                <div class="az-signin-header">
                    <h2>Welcome back!</h2>
                    <h4>Please sign in to continue</h4>

                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter your username" />
                        </div>
                        <!-- form-group -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" />
                        </div>
                        <!-- form-group -->
                        <button type="submit" class="btn btn-az-primary btn-block">Sign In</button>
                    </form>
                </div>
                <!-- az-signin-header -->
                <div class="az-signin-footer">
                    <p><a href="">Forgot password?</a></p>
                </div>
                <!-- az-signin-footer -->
            </div>
            <!-- az-card-signin -->
        </div>
        <!-- az-signin-wrapper -->

        <script src="/lib/jquery/jquery.min.js"></script>
        <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/lib/ionicons/ionicons.js"></script>

        <script src="/js/azia.js"></script>
        <script>
            $(function () {
                "use strict";

            });
        </script>
    </body>
</html>
