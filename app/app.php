<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    // Starts session, and makes an array for list_of_cars.
    // This list contains four default cars that can not be removed.

    session_start();

    $porsche = new Car("2014 Porsche 911", 114991, 7864, "/images/porsche.jpg");
    $ford = new Car("2011 Ford F450", 55995, 14214, "/images/ford.jpg");
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000, "/images/lexus.jpg");
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "/images/mercedes.jpg");
    $cars = array($porsche, $ford, $lexus, $mercedes);

    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = $cars;
    }

    // Direct app to twig.path

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    // Home page: car search form.

    $app->get("/", function() use ($app) {
        return $app['twig']->render('cars.html.twig', array('cars' => Car::getAll()));
    });

    // Page: car newly added.

    $app->post('/car_added', function() use ($app) {
        $car = new Car($_POST['model'], $_POST['price'], $_POST['miles'], $_POST['image']);
        $car->save();
        return $app['twig']->render('car_added.html.twig', array('newcar' => $car));
    });

    // Page: Delete cars

    $app->post('/delete_cars', function() use ($app) {
        Car::deleteAll();
        return $app['twig']->render('delete_cars.html.twig');
    });

    // Page: results display.

    $app->get('/results', function() use ($app) {

        // $cars = array(Car::getAll());
        $cars_we_want = array();
        foreach ($_SESSION['list_of_cars'] as $car) {
            if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
                array_push($cars_we_want, $car);
            }
        }
        // Set the array "cars" as equal to "$cars_we_want", pass it to results page
        return $app['twig']->render('results.html.twig', array('cars' => $cars_we_want ));

    });

    return $app;

?>
