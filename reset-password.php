<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="img/x-icon.jpg" />
  <title>EEI Service Desk</title>
  <?php include 'templates/css_resources.php' ?>
</head>


  <body id="login-page" class="valign-wrapper">
  <div class="container">
      <div class="valign-wrapper">
          <div class="card-panel" id="login" class="row">
            <div class="card-content white-text">
              <div class="row">
                <img src="img/logo.png" class="login-logo">
            </div>
                <span class="card-title"><h5>EEI Corporation's Service Desk</h5></span>
            </div>
            <form id="reset-password" name="reset-password" method="post">
              <div class="row">
                <div data-position="right" data-delay="50" data-html="true" data-tooltip="Password Requirements:<br>
                  - 8-20 characters <br>
                  - At least one uppercase letter (A-Z) <br>
                  - At least one lowercase letter (a-z) <br>
                  - At least one number (0-9) <br>
                  - At least one special character (!@#$%^*())" class="tooltipped input-field col s12" id="login">
                  <input  id="newpass" name="newpass" type="password" class="validate">
                  <label for="newpass" id="newpass">New Password</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="confirmnewpass" name="confirmnewpass" type="password" class="validate">
                  <label for="confirmnewpass" id="confirmnewpass">Confirm New Password</label>
                </div>
              </div>
              <br>
              <div class="row">
                 <input class="waves-effect waves-light btn-login" id="button-login" name="submit" type="submit" value="Update Password">
                 <br>
              </div>
              </form>
            </div>
        </div>
    </div>
    <?php include 'templates/js_resources.php' ?>
  </body>
</html>
