<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 500px;
      margin-top: 50px;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-color: #dc3545;
    }

    .form-check-input {
      margin-right: 5px;
    }
  </style>
</head>

<body>

  <?php include_once("layouts/header.php"); ?>

  <div class="container">
    <h3 class="text-center text-primary">Registration Form</h3>
    <div class="text-center mb-3">
      <img src="images/reg/register.png" alt="Registration Image" width="120" height="80">
    </div>
    <form action="index.php" method="post">

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="uname" placeholder="Enter Username">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" class="form-control" name="age">
      </div>

      <div class="mb-3">
        <label class="form-label">Gender</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="male">
          <label class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="female">
          <label class="form-check-label">Female</label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob">
      </div>

      <div class="mb-3">
        <label class="form-label">Select City</label>
        <select class="form-select" name="city">
          <option value="Amravati">Amravati</option>
          <option value="Akola">Akola</option>
          <option value="Washim">Washim</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Hobbies</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="hobbies[]" value="Cooking">
          <label class="form-check-label">Cooking</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="hobbies[]" value="Dancing">
          <label class="form-check-label">Dancing</label>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-danger">Register Now</button>
        <p class="mt-3">
          <a href="login.php" class="text-decoration-none">Already have an account? Login Here</a>
        </p>
      </div>

    </form>
  </div>

  <?php include_once("layouts/footer.php"); ?>

</body>

</html>