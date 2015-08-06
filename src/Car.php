<?php
  class Car
  {
      private $model;
      private $price;
      private $miles;
      public $image;


    function __construct($model, $price, $miles, $image = "/images/car3.png") {
      $this->model = $model;
      $this->price = $price;
      $this->miles = $miles;
      $this->image = $image;
    }

    function getModel() {
      return $this->model;
    }

    function setModel($model) {
      if (is_string($model)) {
        $this->model = $model;
      }
    }

    function getPrice() {
      return $this->price;
    }

    function setPrice($price) {
      $intPrice = (int) $price;
      if ($intPrice != 0) {
        $this->price = $intPrice;
      }
    }

    function getMiles() {
      return $this->miles;
    }

    function setMiles($miles){
      $int_miles = (int) $miles;
      if ($int_miles != 0){
        $this->miles = $int_miles;
      }
    }

    function getImage() {
      return $this->image;
    }

    function setImage($image) {
      $this->image = $image;
    }

    function save() {
        array_push($_SESSION['list_of_cars'], $this);
    }

    static function getAll() {
        return $_SESSION['list_of_cars'];
    }

    static function deleteAll() {
        $_SESSION['list_of_cars'] = array();
    }

  }
?>
