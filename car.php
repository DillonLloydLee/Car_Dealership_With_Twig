<?php
  class Car
  {
      private $model;
      private $price;
      private $miles;
      public $image;


    function __construct($model, $price, $miles, $image = "images/car3.png") {
      $this->model = $model;
      $this->price = $price;
      $this->miles = $miles;
      $this->image = $image;
    }

    function getModel() {
      return $this->model;
    }

    function getPrice() {
      return $this->price;
    }

    function getMiles() {
      return $this->miles;
    }

    function getImage() {
      return $this->image;
    }

    function setModel($model) {
      if (is_string($model)) {
        $this->model = $model;
      }
    }

    function setPrice($price) {
      $intPrice = (int) $price;
      if ($intPrice != 0) {
        $this->price = $intPrice;
      }
    }

    function setMiles($miles){
      $int_miles = (int) $miles;
      if ($int_miles != 0){
        $this->miles = $int_miles;
      }
    }

    function setImage($image) {
      $this->image = $image;
    }


  }

  $porsche = new Car("2014 Porsche 911", 114991, 7864, "images/porsche.jpg");
  $ford = new Car("2011 Ford F450", 55995, 14214, "images/ford.jpg");
  $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "images/lexus.jpg");
  $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "images/mercedes.jpg");



  $cars = array($porsche, $ford, $lexus, $mercedes);



  $cars_we_want = array();
  foreach ($cars as $car) {
    if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"])
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
              $carModel = $car->getModel();
              $carPrice = $car->getPrice();
              $carMiles = $car->getMiles();
              echo "<li> $carModel </li>";
              echo "<ul>";
                  echo "<img src='$car->image' height=100 width=200>";
                  echo "<li> $$carPrice </li>";
                  echo "<li> Miles: $carMiles </li>";
              echo "</ul>";
              echo "<li></li>";
             }
        ?>
    </ul>
  </body>
  </html>
