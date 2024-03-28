<?php

class Employee {
    private $name;
    private $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->setSalary($salary);
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setSalary($salary) {
        // Ensure salary is a positive value
        if ($salary >= 0) {
            $this->salary = $salary;
        } else {
            echo "Invalid salary value. Salary must be a non-negative number.\n";
        }
    }

    public function getSalary() {
        return $this->salary;
    }
}

// Usage
$employee = new Employee("Sabbir Hossain", 15000);
echo "Employee Name: " . $employee->getName() . "\n"; // Output: Employee Name: Sabbir Hossain
echo "Employee Salary: " . $employee->getSalary() . "\n"; // Output: Employee Salary: 15000

// Try setting invalid salary
$employee->setSalary(-1000); // Output: Invalid salary value. Salary must be a non-negative number.

?>
