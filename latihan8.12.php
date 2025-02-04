<?php
class Employee {
    private $firstName;
    private $lastName;
    private $age;

    public function __construct($firstName, $lastName, $age) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFirstName() {
        return $this->firstName; // Perbaiki sintaks
    }

    public function getLastName() {
        return $this->lastName;  // Tambahkan method ini
    }

    public function getAge() {
        return $this->age;  // Perbaiki sintaks
    }
}

// Membuat objek Employee
$objEmployeeOne = new Employee('Bob', 'Smith', 30);
echo $objEmployeeOne->getFirstName() . "<br/>"; // prints 'Bob'
echo $objEmployeeOne->getLastName() . "<br/>";  // prints 'Smith'
echo $objEmployeeOne->getAge() . "<br/>";       // prints '30'

$objEmployeeTwo = new Employee('John', 'Smith', 34);
echo $objEmployeeTwo->getFirstName() . "<br/>"; // prints 'John'
echo $objEmployeeTwo->getLastName() . "<br/>";  // prints 'Smith'
echo $objEmployeeTwo->getAge() . "<br/>";       // prints '34'
?>
