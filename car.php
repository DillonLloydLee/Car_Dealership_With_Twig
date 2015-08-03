<?php
  class Car
  {

    function __construct($make_model, $price, $miles, $image_path = "images/car3.png") {
      $this->make_model = $make_model;
      $this->price = $price;
      $this->miles = $miles;
      $this->image = $image_path;
    }
  }

  $porsche = new Car("2014 Porsche 911", 114991, 7864, "images/porsche.jpg");
  $ford = new Car("2011 Ford F450", 55995, 14214, "images/ford.jpg");
  $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
  $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");



  $cars = array($porsche, $ford, $lexus, $mercedes);



  $cars_we_want = array();
  foreach ($cars as $car) {
    if ($car->price < $_GET["price"] && $car->miles < $_GET["miles"])
     {
      array_push($cars_we_want, $car);
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            if ($cars_we_want == array())
              echo "No cars found.  Sorry.";

            foreach ($cars_we_want as $car) {
              echo "<li> $car->make_model </li>";
              echo "<ul>";
                  echo "<img src='$car->image' height=100 width=200>";
                  echo "<li> $$car->price </li>";
                  echo "<li> Miles: $car->miles </li>";
              echo "</ul>";
              echo "";
             }
        ?>
    </ul>
  </body>
  </html>
