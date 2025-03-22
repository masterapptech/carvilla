<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    .customdiv {
      font-size: small;
      text-align: center;
      margin: 8px;
      background-color: rgb(255, 255, 255);
    }

    .carbg {
      background: linear-gradient(0deg,
          rgb(172, 246, 247) 0%,
          rgb(253, 253, 253) 100%);
      height: 85%;
    }

    .carsize {
      width: 200px;
      height: 150px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $(document).ready(function() {
      var qs = window.location.search;
      var params = new URLSearchParams(qs)
      var fdata = {}

      if (!params.has("filter")) //filter not present that means redirected from search button
      {
        fdata = {
          "RESULT_TYPE": "GET_CARS_INFO",
          "YEAR": params.get("year"),
          "MAKE": params.get("make"),
          "MODEL": params.get("model"),
          "STYLE": params.get("style"),
          "CONDITION": params.get("condition"),
          "PRICE": params.get("price")
        }
      } else { //filter  present that means redirected from filters

        fdata = {
          "RESULT_TYPE": "GET_CARS_INFO",
          "CATEGORY": params.get("filter").split("-")[0],
          "FILTER": params.get("filter").split("-")[1],
        }
      }

      $.ajax({
        url: "functions.php",
        type: "POST",
        data: fdata,
        success: function(res) {
          console.log(res)
          var jobj = JSON.parse(res)
          console.log(jobj)
          getCarsInfo(jobj)
        }
      });




    });
  </script>
</head>

<body>

  <?php
  include_once("layouts/header.php");
  ?>


  <div style="display: flex">
    <div style="width: 20%">
      <img
        src="images/price.webp"
        alt=""
        style="width: 25px; height: 25px"
        class="m-2" />
      <label for=""><b> Buget</b></label>
      <div style="display: flex">
        <input disabled type="text" class="form-control m-2" value="100000" />
        <input disabled type="text" class="form-control m-2" value="2000000" id="maxPriceRange" />
      </div>
      <input id="priceRange" type="range" class="w-100 m-2" min="100000" max="2000000" onchange="rangeChange()" />
      <div>
        <span class="text-black-50">Minimum</span>
        <span class="text-black-50" style="margin-left: 40%">Maximum</span>
      </div>
      <p class="text-black-50 mt-2">Suggestions</p>
      <div>
        <button class="btn btn-outline-danger rounded m-1">
          Under 3 Lakh
        </button>
        <button class="btn btn-outline-danger rounded m-1">
          From 3 Lakh to 5 Lakh
        </button>
        <button class="btn btn-outline-danger rounded m-1">
          From 5 Lakh to 10 Lakh
        </button>
        <button class="btn btn-outline-danger rounded m-1">
          Above 10 Lakh
        </button>
      </div>
      <img
        src="images/brand.webp"
        alt=""
        style="width: 25px; height: 25px"
        class="m-2" />
      <label for=""><b> Make and Model</b></label>
      <input
        type="text"
        class="form-control m-2"
        placeholder="Search a brand or model" />

      <div class="m-2" id="modelfilter">



      </div>
    </div>

    <div style="width: 80%; padding: 2%; display: flex; flex-wrap: wrap;" id="cars">




    </div>
  </div>


  <?php
  include_once("layouts/footer.php");
  ?>


</body>

<script>
  function applyFilter(maxprice) {

    $.ajax({
      url: "functions.php",
      type: "POST",
      data: {
        "RESULT_TYPE": "APPLY_FILTER",
        "MAXPRICE": maxprice
      },
      success: function(res) {
        console.log(res)
        var jobj = JSON.parse(res)
        cars.innerHTML=""
        getCarsInfo(jobj);

      } //success
    }); //ajax

  }

  priceRange.addEventListener("input", function() {
    maxPriceRange.value = this.value;
  });


  function rangeChange() {
    console.log("Final Value: ", priceRange.value)
    applyFilter(priceRange.value)
  }


  function redirectToCarInfo() {
    console.log(this.id)
    window.location.href = "carinfo.php?carid=" + this.id
  }

  function getCarsInfo(carArr) {
    var maindivclasses = ["w-25", "rounded-3", "p-2", "m-2", "bg-info", "shadow-sm", "carbg"]
    for (var i = 0; i < carArr.length; i++) {
      var car = carArr[i]
      var maindiv = document.createElement("div")
      maindiv.classList.add(...maindivclasses)
      maindiv.style.height = "450px"
      maindiv.addEventListener("click", redirectToCarInfo)
      maindiv.id = car.id

      var carimg = document.createElement("img")
      carimg.src = "images/" + car.image
      carimg.classList.add("carsize")
      maindiv.appendChild(carimg)

      hr1 = document.createElement("hr")
      maindiv.appendChild(hr1)

      h_5 = document.createElement("h5")
      h_5.innerHTML = car.name
      maindiv.appendChild(h_5)

      rowdiv = document.createElement("div")
      rowdiv.classList.add("row")

      coldiv1 = document.createElement("div")
      coldiv1.classList.add("col", "customdiv")
      coldiv1.innerHTML = car.model
      rowdiv.appendChild(coldiv1)

      coldiv2 = document.createElement("div")
      coldiv2.classList.add("col", "customdiv")
      coldiv2.innerHTML = car.kms + " kms"
      rowdiv.appendChild(coldiv2)

      coldiv3 = document.createElement("div")
      coldiv3.classList.add("col", "customdiv")
      coldiv3.innerHTML = car.fuelType
      rowdiv.appendChild(coldiv3)

      coldiv4 = document.createElement("div")
      coldiv4.classList.add("col", "customdiv")
      coldiv4.innerHTML = car.owner
      rowdiv.appendChild(coldiv4)

      maindiv.appendChild(rowdiv)

      h_6 = document.createElement("h6")
      h_6.innerHTML = `EMI ₹ ${car.emi}/m`
      maindiv.appendChild(h_6)

      l1 = document.createElement("label")
      l1.innerHTML = "₹ " + car.discountedPrice
      l1.classList.add("fw-bold")
      l1.style.fontSize = "x-large"
      maindiv.appendChild(l1)

      s1 = document.createElement("strike")
      s1.innerHTML = "₹ " + car.price
      s1.classList.add("text-black-50")
      maindiv.appendChild(s1)

      l2 = document.createElement("label")
      l2.innerHTML = "Other Charges"
      maindiv.appendChild(l2)

      p1 = document.createElement("p")
      p1.innerHTML = "₹ " + car.otherCharges
      maindiv.appendChild(p1)

      cars.appendChild(maindiv)


    }
    console.log(maindiv)

  }

  createModelFilter();

  function createModelFilter() {

    $.ajax({
      url: "functions.php",
      type: "POST",
      data: {
        "RESULT_TYPE": "GET_MODEL_FILTER"
      },
      success: function(res) {
        console.log(res)
        var jobj = JSON.parse(res)

        var modelsarr = jobj
        for (var i = 0; i < modelsarr.length; i++) {
          var ip = document.createElement("input")
          ip.type = "checkbox";
          ip.classList.add("form-check-input")
          modelfilter.appendChild(ip)

          var sp = document.createElement("span")
          sp.classList.add("text-black-50")
          sp.innerHTML = `${modelsarr[i]} (${i})`
          modelfilter.appendChild(sp)

          var br1 = document.createElement("br")
          modelfilter.appendChild(br1)
        } //for


      } //success
    }); //ajax

  } //function
</script>

</html>