<?php

namespace Task02;

class Vector
{
    public $x;
    public $y;
    public $z;

    public function __construct($x, $y, $z)
    {
        $this->validateCoordinate($x);
        $this->validateCoordinate($y);
        $this->validateCoordinate($z);

        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function add(Vector $vector)
    {
        return new Vector($this->x + $vector->x, $this->y + $vector->y, $this->z + $vector->z);
    }

    public function sub(Vector $vector)
    {
        return new Vector($this->x - $vector->x, $this->y - $vector->y, $this->z - $vector->z);
    }

    public function product($number)
    {
        return new Vector($this->x * $number, $this->y * $number, $this->z * $number);
    }

    public function scalarProduct(Vector $vector)
    {
        return $this->x * $vector->x + $this->y * $vector->y + $this->z * $vector->z;
    }

    public function vectorProduct(Vector $vector)
    {
        $newX = $this->y * $vector->z - $this->z * $vector->y;
        $newY = $this->z * $vector->x - $this->x * $vector->z;
        $newZ = $this->x * $vector->y - $this->y * $vector->x;

        return new Vector($newX, $newY, $newZ);
    }

    public function __toString()
    {
        return "({$this->x}; {$this->y}; {$this->z})";
    }

    private function validateCoordinate($coord)
    {
        if (!is_numeric($coord)) {
            throw new InvalidArgumentException("Coordinates must be numeric.");
        }
    }
}

// Пример использования
// try {
//     $vector1 = new Vector(1, -2, 3);
//     $vector2 = new Vector(2, 3, 1);

//     echo "Vector 1: $vector1\n";
//     echo "Vector 2: $vector2\n";

//     $sum = $vector1->add($vector2);
//     echo "Sum: $sum\n";

//     $difference = $vector1->sub($vector2);
//     echo "Difference: $difference\n";

//     $product = $vector1->product(2);
//     echo "Product: $product\n";

//     $scalarProduct = $vector1->scalarProduct($vector2);
//     echo "Scalar product: $scalarProduct\n";

//     $vectorProduct = $vector1->vectorProduct($vector2);
//     echo "Vector product: $vectorProduct\n";
// } catch (InvalidArgumentException $e) {
//     echo "Error: " . $e->getMessage();
// }
