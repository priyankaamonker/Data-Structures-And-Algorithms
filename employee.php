<?php
class employee {
	var $employeeNumber;
	var $firstName;
	var $lastName;
	var $emailId;
	function __construct($employeeNumber, $firstName, $lastName, $emailId) {
		$this->employeeNumber = $employeeNumber;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->emailId = $emailId;
    }
}

function sortBy_employeeNumber($data) {
	$length = count($data);
	for($i=0;$i<=$length-1;$i++) {
		$current = $data[$i];
		$j = $i - 1;
		while($j >= 0 && $data[$j]->employeeNumber > $current->employeeNumber) {
			$data[$j+1] = $data[$j];
			$j--;
		}
		$data[$j+1] = $current;
	}
	return $data;		
}
	
$emp1 = new employee("999999994","John","Doe","john@example.com");
$emp2 = new employee("999999992","Mary","Cox","mary@example.com");
$emp3 = new employee("999999995","Iris","West","iris@example.com");
$emp4 = new employee("999999991","Ben","Allen","ben@example.com");
$emp5 = new employee("999999993","Eddie","Tong","eddie@example.com");

$employees = array($emp1,$emp2,$emp3,$emp4,$emp5);
$sorted = sortBy_employeeNumber($employees);
print_r($sorted);
?>