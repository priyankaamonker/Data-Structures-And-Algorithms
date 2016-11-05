<?php  
function insertionSort($data) {
    $length = count($data);
    for($i=0;$i<=$length-1;$i++) {
		$current = $data[$i];
		$j = $i - 1;
        while($j >= 0 && $data[$j] > $current) {
			$data[$j+1] = $data[$j];
			$j--;
        }
        $data[$j+1] = $current;
    }
    return $data;
}
$_array = array(12,4,5,2,90,3,1,34,55);
$_array = insertionSort($_array);
print_r($_array);
?>