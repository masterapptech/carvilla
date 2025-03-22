<?php

$RESULT_TYPE = $_POST["RESULT_TYPE"];
switch ($RESULT_TYPE) {
    case "LOGIN":
        $result = login($_POST["USERNAME"], $_POST["PASSWORD"]);
        echo $result;
        break;
    case "REGISTRATION":
        $result = registration($_POST["uname"], $_POST["password"], $_POST["age"], $_POST["gender"], $_POST["dob"], $_POST["city"]);
        echo $result;
        break;
    case "GET_CARS":
        $result = getCars();
        echo $result;
        break;
    case "GET_CATEGORIES":
        $result = getCategories();
        echo $result;
        break;
    case "GET_YEAR_MAKE_MODEL":
        $result = yearMakeModel();
        echo $result;
        break;

    case "GET_CARS_INFO":
        $result = getCarsInfo($_POST);
        echo $result;
        break;

    case "GET_CAR_INFO":
        $result = getCarInfo();
        echo $result;
        break;


    case "GET_OTP":
        $result = getOtp($_POST["MOBILENO"]);
        echo $result;
        break;


    case "GET_MODEL_FILTER":
        $result = getModelFiler();
        echo $result;
        break;

    case "APPLY_FILTER":
        $result = applyFilter($_POST["MAXPRICE"]);
        echo $result;
        break;
   
}
function applyFilter($maxprice)
{

    $car1 = array(
        "image" => "c1.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Top Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "1st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 1
    );

    $car2 = array(
        "image" => "c2.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Top Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "1st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 2
    );

    $car3 = array(
        "image" => "c3.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Base Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "2st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 3
    );

    $car4 = array(
        "image" => "c4.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Base Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "2st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 4
    );

    if($maxprice>=100000 && $maxprice<500000)
    {
        $cars = array($car1);
    }else if($maxprice>=500000 && $maxprice<1000000)
    {
        $cars = array($car1,$car2);
    }else if($maxprice>=1000000 && $maxprice<1500000)
    {
        $cars = array($car1,$car2,$car3);
    }else{
        $cars = array($car1,$car2,$car3,$car4);  
    }
 
    return json_encode($cars);

}

function getModelFiler()
{
    return json_encode(["Honda", "Renault", "Ford", "Tata", "Mahindra", "Audi",""]);
}

function getOtp($mobileno)
{
    $randomNo = rand(1000, 9999);
    return json_encode(array("otp" => $randomNo));
}


function getCarInfo()
{
    $car = array(
        "id" => 1,
        "make" => "Tata",
        "model" => "Nexon",
        "fuelType" => "Petrol",
        "makeYear" => 2018,
        "location" => "Amravati",
        "emi" => 9500,
        "price" => 250000,
        "discountedPrice" => 200000,
        "otherCharges" => 50000,
        "mainImage" => "sc1.webp",
        "smallImages" => ["sc1.webp", "sc2.webp", "sc3.webp", "sc4.webp"],
        "kms" => 47000,
        "transmission" => "Manual",
        "ownership" => "1st Owner",
        "regNo" => "MH-27-DJ4463"
    );
    $kyc = array(
        "alloyWheels" => "Available",
        "ssf" => "ABS | 2 Air Bags | Anti Theft System | GPS",
        "cityDriven" => "Cars driven for shorter trips in cities",
        "regYear" => 2018,
        "engine" => 1197,
        "insurance" => 3520,
        "spareKey" => "Yes"
    );
    $carinfo = array("car" => $car, "kyc" => $kyc);
    return json_encode($carinfo);
}

function getCarsInfo($FILTER)
{
    //change db query according to $filter
    $car1 = array(
        "image" => "c1.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Top Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "1st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 1
    );

    $car2 = array(
        "image" => "c2.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Top Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "1st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 2
    );

    $car3 = array(
        "image" => "c3.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Base Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "2st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 3
    );

    $car4 = array(
        "image" => "c3.png",
        "name" => "2018 Ford Eco Sport RXL MT",
        "model" => "Base Model",
        "kms" => 40882,
        "fuelType" => "Petrol",
        "owner" => "2st Owner",
        "emi" => 12756,
        "discountedPrice" => 675000,
        "price" => 875000,
        "otherCharges" => 25000,
        "id" => 4
    );

    if (isset($FILTER["FILTER"]))
        $cars = array($car1, $car2, $car3);
    else
        $cars = array($car1);

    return json_encode($cars);
}



function yearMakeModel()
{
    $years = array(2020, 2021, 2022, 2023, 2024);
    $make = array("Tata", "Mahindra", "Audi", "Maruti", "Honda");
    $model = array(
        "Tata" => array("Tigor", "Nexon", "Safari", "Harrier"),
        "Mahindra" => array("Thar", "Scorpio", "XUV"),
        "Audi" => array("Audi Q3", "Audi Q7", "Audi A6"),
        "Maruti" => array("Baleno", "Vitara", "Wagon R", "Celerio")
    );
    $yearMakeModel = array("years" => $years, "make" => $make, "model" => $model);
    return json_encode($yearMakeModel);
}


function getCategories()
{
    $cat1 = array(
        "image" => "hatchback.webp",
        "name" => "Hatchback",
        "id" => 1,
        "fname" => "hatchback"
    );
    $cat2 = array(
        "image" => "suv.webp",
        "name" => "XUV",
        "id" => 2,
        "fname" => "xuv"
    );
    $cat3 = array(
        "image" => "sedan.webp",
        "name" => "Sedan",
        "id" => 3,
        "fname" => "sedan"
    );

    $bodyType = array("category" => array($cat1, $cat2, $cat3));

    $bd1 = array("name" => "Under 5 Lakh", "id" => 1, "fname" => "0_5");
    $bd2 = array("name" => "5 - 10 Lakh", "id" => 2, "fname" => "5_10");
    $bd3 = array("name" => "10 - 15 Lakh", "id" => 3, "fname" => "10_15");
    $bd4 = array("name" => "Above 15 Lakh", "id" => 4, "fname" => "15_20");
    $bd5 = array("name" => "Above 20 Lakh", "id" => 5, "fname" => "20_100");
    $budget = array("category" => array($bd1, $bd2, $bd3, $bd4, $bd5));

    $ft1 = array("name" => "Petrol", "id" => 1, "fname" => "petrol");
    $ft2 = array("name" => "Diesel", "id" => 2, "fname" => "diesel");
    $ft3 = array("name" => "Electric", "id" => 3, "fname" => "electric");
    $ft4 = array("name" => "CNG", "id" => 4, "fname" => "cng");
    $ft5 = array("name" => "Hybrid", "id" => 5, "fname" => "hybrid");
    $fuelType = array("category" => array($ft1, $ft2, $ft3, $ft4, $ft5));

    $yr1 = array("name" => "2020", "id" => 1, "fname" => "2020");
    $yr2 = array("name" => "2021", "id" => 2, "fname" => "2021");
    $yr3 = array("name" => "2022", "id" => 3, "fname" => "2022");
    $yr4 = array("name" => "2023", "id" => 4, "fname" => "2023");
    $yr5 = array("name" => "2024", "id" => 5, "fname" => "2024");
    $years = array("category" => array($yr1, $yr2, $yr3, $yr4, $yr5));
    $categories = array("bodyType" => $bodyType, "budget" => $budget, "fuelType" => $fuelType, "years" => $years);
    return json_encode($categories);
}

function login($username, $password)
{
    $result = "";
    if ($username == "admin" && $password == "admin") {
        session_start();
        $_SESSION["USERNAME"] = $username;
        $_SESSION["LOGIN"] = true;

        $result = array("result" => 1, "message" => "Login Success");
        $result = json_encode($result);
    } else {
        $result = array("result" => 0, "message" => "Login Failed");
        $result = json_encode($result);
    }
    return $result;
}

function registration($uname, $password, $age, $gender, $dob, $city)
{
    $result = array("result" => 1, "message" => "Registration Success");
    $result = json_encode($result);
    return $result;
}

function getCars()
{
    $car1 = array(
        "image" => "c1.png",
        "make" => "Bata",
        "model" => "Nexon",
        "discountedPrice" => 250000,
        "desc" => "Description",
        "kms" => 150000,
        "smallImages" => ["sc1.webp", "sc2.webp", "sc3.webp", "sc4.webp"],
        "id" => 1
    );
    $car2 = array(
        "image" => "c2.png",
        "make" => "Mahindra",
        "model" => "Nexon",
        "discountedPrice" => 250000,
        "desc" => "Description",
        "kms" => 150000,
        "smallImages" => ["sc1.webp", "sc2.webp", "sc3.webp", "sc4.webp"],
        "id" => 2
    );
    $car3 = array(
        "image" => "c3.png",
        "make" => "Audi",
        "model" => "Nexon",
        "discountedPrice" => 250000,
        "desc" => "Description",
        "kms" => 150000,
        "smallImages" => ["sc1.webp", "sc2.webp", "sc3.webp", "sc4.webp"],
        "id" => 3
    );
    $car4 = array(
        "image" => "c4.png",
        "make" => "Suzuki",
        "model" => "Nexon",
        "discountedPrice" => 250000,
        "desc" => "Description",
        "kms" => 150000,
        "smallImages" => ["sc1.webp", "sc2.webp", "sc3.webp", "sc4.webp"],
        "id" => 4
    );
    $car5 = array(
        "image" => "c6.png",
        "make" => "BMW",
        "model" => "Nexon",
        "discountedPrice" => 250000,
        "desc" => "Description",
        "kms" => 150000,
        "smallImages" => ["sc1.webp", "sc2.webp", "sc3.webp", "sc4.webp"],
        "id" => 5
    );

    $cars = array($car1, $car2, $car3, $car4, $car5);
    $cars = array("cars" => $cars);
    return json_encode($cars);
}
