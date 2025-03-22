<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/cars.css">



<div style="display: flex; width: 100%; background-color:rgb(42, 46, 84); height:15%">

    <div class="navElement" style="text-align:center; width:20%"> <a href="index.php"> <img src="images/logo.png" alt="" style="width:150px; height:100px; margin-top:-25px"> </a> </div>


    <div class="navElement">Service</div>
    <div class="navElement">Home</div>
    <div class="navElement" style="width: 15%;">Featured Cars</div>
    <div class="navElement">Old Cars</div>
    <div class="navElement">Brands</div>
    <div class="navElement">Contact
    </div>
    <div style="width:20%; padding-top:15px">
        <?php
        session_start();
        if (isset($_SESSION["LOGIN"]) && $_SESSION["LOGIN"]) {
            echo "<h5 style='color:white'>Welcome " . $_SESSION["USERNAME"] . "</h6>";
            echo "<button class='btn btn-danger w-50' style='margin-left:25px' onclick='redirectToLogout();'> Logout</button>";
        } else {
        ?>

            <button class="btn btn-danger w-50" style="margin-left:25px" onclick="redirectToLogin();"> Login</button>

        <?php
        }
        ?>

    </div>
</div>

<script>
    function redirectToLogin() {
        window.location.href = "login.php"
    }

    function redirectToLogout() {
        window.location.replace("logout.php");
    }
</script>