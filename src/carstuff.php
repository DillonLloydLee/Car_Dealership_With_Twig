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
?>
