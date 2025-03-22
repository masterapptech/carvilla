<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.7.1.min.js"></script>


  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 400px;
      margin-top: 50px;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>

  <script>
    function login() {
      if (username.value != "" && password.value != "") {
        $.ajax({
          url: "functions.php",
          type: "POST",
          data: {
            "RESULT_TYPE": "LOGIN",
            "USERNAME": username.value,
            "PASSWORD": password.value
          },
          success: function(res) {
            console.log(res)
            var jobj = JSON.parse(res)
            if (jobj.result == 1) {
              toastr.success("Login Successful")
            
              setTimeout(() => {
                window.location.replace("index.php");
              }, 1000);
 
            } else {
              toastr.error("Login Failed")
            }


          }
        });

      } else {
        toastr.info("Enter Username and Password")
      }
    }
  </script>

</head>

<body>

  <?php
  include_once("layouts/header.php");
  ?>


  <div class="container w-75">
    <h3 class="text-center text-primary">Login Form</h3>
    <div class="text-center mb-3">
      <img src="images/login.jpeg" alt="Login Image" width="120" height="80">
    </div>

    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required>
    </div>


    <div class="text-center">
      <button type="submit" class="btn btn-primary" onclick="login();">Login Now</button>
    </div>

    <div class="text-center mt-3">
      <a href="registration.php" class="text-decoration-none">Don't have an account? Create Now</a>
      <br>
      <a href="https://www.google.com" class="text-decoration-none">Google</a>
    </div>

  </div>


  <?php
  include_once("layouts/footer.php");
  ?>

</body>

  <!--Toastr-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>




</html>