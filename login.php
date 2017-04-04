<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login to Pages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <link rel="stylesheet" href="css/login.css">
  <style>

    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
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
                  <form action = "verification.php" class="login" method="POST" id="mainForm"/>
                  <input type="text" name ="uname" placeholder="Username" class = "required"/>
                  <input type="password" name ="pass" placeholder="Password" class = "required"/>
                  <input type="submit" value="Sign In" class="btn btn-success btn-sm"/> <p></p>
                  <a href = "register.php">
                    <input type="button" value="Not a user? Register now." class="btn btn-success btn-block"/>
                  </a>
                  </form>
              </div>
          </div>
      </div>
  </div>

</body>
</html>
