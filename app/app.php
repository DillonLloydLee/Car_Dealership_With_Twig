<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/Car.php";

  // Direct app to twig.path

  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider(), array( 'twig.path' => __DIR__'/../views'));

  $app->get("/", function() {
    return
    "<!DOCTYPE html>
    <html>
    <head>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
      <title>Find a Car</title>
    </head>
    <body>
      <div class='container'>
        <h1>Find a Car!</h1>
        <form action='/carfinal'>

          <div class='form-group'>
            <label for='price'>Enter Maximum Price:</label>
            <input id='price' name='price' class= 'form-control' type='number'>
          </div>

          <div class='form-group'>
            <label for='miles'>Enter Maximum Mileage:</label>
            <input id='miles' name='miles' class= 'form-control' type='number'>
          </div>

          <button type='submit' class='btn-success'>Submit</button>
        </form>
      </div>
    </body>
    </html>"
    ;
  });

  $app->get("carfinal", function() {
    $porsche = new Car("2014 Porsche 911", 114991, 7864, "/images/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995, 14214, "/images/ford.jpg");
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "/images/lexus.jpg");
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "/images/mercedes.jpg");
    $cars = array($porsche, $ford, $lexus, $mercedes);

    $cars_we_want = array();
    foreach ($cars as $car) {
      if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"])
       {
        array_push($cars_we_want, $car);
      }
    }

    $output = "";

    $output = $output .
      "<head>
        <title>Your Car Dealership's Homepage</title>
      </head>
      <body>
          <h1>Your Car Dealership</h1>
      </body>
      </html>";

    if ($cars_we_want == array()) {
      $output = $output .
      "<h2>Sorry, no cars available<h2>
      </body>
      </html>";
    }



    foreach ($cars_we_want as $car) {
      $carModel = $car->getModel();
      $carPrice = $car->getPrice();
      $carMiles = $car->getMiles();
      $output = $output .
        "<li> $carModel </li>
        <ul>
            <img src='$car->image' height=100 width=200>
            <li> $$carPrice </li>
            <li> Miles: $carMiles </li>
          </ul>
          <li></li>
        ";
      }

      return $output;

      ;
  });

  return $app;

?>
