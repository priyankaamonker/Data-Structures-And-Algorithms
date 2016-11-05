<?php
//recursive way
function factorial($n) {
	if($n == 0)
		return 1;
	return $n * factorial($n-1); 
}
echo factorial(3);
//recursive way end

echo "<br>";

//iterative way
function factorial2($n) {
	$result = $n;
	for($i=$n-1;$i>1;$i--) {
		$result = $result * $i;
	}
	return $result;
}
echo factorial2(5);
//iterative way end
?>