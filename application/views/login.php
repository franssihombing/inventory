
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/login/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/login/') ?>css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/login/') ?>css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/login/') ?>css/iofrm-theme17.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="#">
                <div class="logo">
                    <img class="logo-size" src="<?php echo base_url('app-assets/login/') ?>images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?php echo base_url('app-assets/login/') ?>images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login</h3>
                        
                       <form id="loginForm" action="<?php echo base_url('secure/check_login'); ?>" data-toggle="validator" method="POST">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget17.html">Forget password?</a>
                            </div>
                        </form>
                       <!--  <div class="other-links">
                            <div class="text">Or login with</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a>
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url('app-assets/login/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('app-assets/login/') ?>js/popper.min.js"></script>
<script src="<?php echo base_url('app-assets/login/') ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('app-assets/login/') ?>js/main.js"></script>
<script type="text/javascript">
	 $(document).ready(function(){
    $("#loginForm").unbind('submit').bind('submit', function() {
  
      var form = $(this);
      var url = form.attr('action');
      var type = form.attr('method');
  
      $.ajax({
        url  : url,
        type : type,
        data : form.serialize(),
        dataType: 'json',
        success:function(response) {
          if(response.success == true) {
            window.location = 'admin';
          }
          else {
            Swal.fire({
              type: 'error',
              title: 'Terjadi Kesalahan',
              text: 'Username / Password anda salah'
            });
          } // /else
        } // /if
      });
  
      return false;
    });
  });
</script>
</body>
</html>