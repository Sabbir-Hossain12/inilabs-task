<?php


abstract class Shape {
    abstract public function area();
}


class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function getRadius()
    {
        return $this->radius;
    }

    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}


class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area() {
        return $this->width * $this->height;
    }
}

// Usage
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

echo "Circle Area: " . $circle->area() . "\n"; // Output: Circle Area: 78.539816339745
echo "Rectangle Area: " . $rectangle->area() . "\n"; // Output: Rectangle Area: 24

?>