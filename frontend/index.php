<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\ionicons.min.css">
    <link rel="stylesheet" href="assets\css\owl.carousel.css">
    <link rel="stylesheet" href="assets\css\owl.theme.css">
    <link rel="stylesheet" href="assets\css\style.css">


  </head>
  <body>
    <header id="home" class="gradient-violat">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="www.lankabrains.lk"><span class="logo-wraper logo-white">
                <img src="assets\images\Logo.png" alt="">LANKABRAINS
              </span></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav  navbar-right ">
              
              <li><a href="#" class="btn btn-orange border-none btn-rounded-corner btn-navbar login-signup" data-toggle="modal" data-target="#loginModal" style="margin-bottom: 2px">Sign In<span class="icon-on-button"><i class="glyphicon glyphicon-log-in"> </i></span></a></li>
              <li><a href="#" class="btn btn-orange border-none btn-rounded-corner btn-navbar login-signup" data-toggle="modal" data-target="#signupModal">Sign Up<span class="icon-on-button"><i class="glyphicon glyphicon-user">  </i></span></a></li>
            </ul>
          </div>
          <hr class="navbar-divider">
        </div><
      </nav>
    </header>
    
    
    <footer class="padding-top-120 gradient-violat" id="contacts"></footer>
    


    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-back" style="width: 70%;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LogIn</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="container  btn-group-justified" style="width: 90%">
                <div class="row social-btn" >
                  <button class="btn btn-block btnFB " id="fb">SignUp Using FaceBook</button>
                </div>
                <div class="row social-btn">
                  <button class="btn btn-block btnGP " id="gp">SignUp Using Google+</button>
                </div>
                <div class="row social-btn">
                  <button class="btn btn-block btnLI " id="ln">SignUp Using Linkedin</button>
                </div>
              </div>
              <br>
              <p class="text-center">- OR -</p>
              <span id="cred_error" class="errors"></span></br>
              <span id="verification_error" class="errors"></span>
              <form id="loginForm">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="abc2gmail.com" required="" id="loginEmail">
                  <span id="email_log_error" class="errors"></span>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="**********" required="" id="loginPwd">
                  <span id="pass_log_error" class="errors"></span>
                </div>
                <div>
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Remember Me
                  </label>
                  <a href="#" class="pull-right">Forget Password</a>
                </div>          
              </form>
              <div class="alert alert-danger alert-dismissable fade in" id="signinAlert" style="display: none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong id="signinMessage"></strong> 
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class=" btn  btn-primary" id="submitLogin">LogIn</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sign Up modal -->
          <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content modal-back" style="width: 70%;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    <div id="reg-erros" class="container  btn-group-justified "  >
                      
                    </div>
                    <div class="container  btn-group-justified " id="social-btn-reg" style="width: 90%">
                      <div class="row social-btn" >
                        <button class="btn btn-block btnFB " id="fb1">SignUp Using FaceBook</button>
                      </div>
                      <div class="row social-btn">
                        <button class="btn btn-block btnGP " id="gp1">SignUp Using Google+</button>
                      </div>
                      <div class="row social-btn">
                        <button class="btn btn-block btnLI " id="ln1">SignUp Using Linkedin</button>
                      </div>
                    </div>
                    <br>
                    <p class="text-center">- OR -</p>
                    <form id="signupForm">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="name" required id="name">
                        <span id="name_error" class="errors"></span>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="abc2gmail.com" required id="signupEmail">
                        <span id="email_error" class="errors"></span>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" id="pwd" placeholder="**********" required>
                        <span id="pass_error" class="errors"></span>
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <label class="pull-right" id="wrongconfpwd"></label>
                        <input type="password" name="password" class="form-control" id="confirmPwd" placeholder="**********" required="">
                        <span id="cof_pass_error" class="errors"></span>
                      </div>
                      <!-- <div>
                        <button type="submit" class="form-control btn btn-primary" onclick="return Validate()" id="submitSignUp">SignUp</button>
                      </div> -->
                      <div>
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"> Remember Me
                        </label>
                      </div>          
                    </form>
                    <div class="alert alert-danger alert-dismissable fade in" id="signupAlert" style="display: none;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                      <strong id="signUpMessage"></strong> 
                    </div>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" id="submitSignUp">SignUP</button>
                </div>
              </div>
            </div>
          </div>





          <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script type="text/javascript" src="assets/plugins/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="assets/js/base.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/index_script.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  </body>

 
</html>
