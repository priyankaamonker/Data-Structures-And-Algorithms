<?php
class CountingSort {
	private $arr;
	private $temp_arr;
	function counting_sort($array, $data) {
		$this->arr = $array;
		$this->temp_arr = new SplFixedArray($data+1);
		$this->temp_arr = array_fill(0, $data+1, 0);
		for($i=0;$i<count($this->arr);$i++) {
			$this->temp_arr[$this->arr[$i]] = $this->temp_arr[$this->arr[$i]] + 1;
		}
		$k = 0;
		for($i=0;$i<$data+1;$i++) {
			if($this->temp_arr[$i] > 0) {
				for($j=0;$j<$this->temp_arr[$i];$j++) {
					$this->arr[$k] = $i;
					$k++;
				}
			}
		}
		print_r($this->arr);
	}
}
$csort = new CountingSort();
$array = [12, 3, 5, 2, 7, 10, 4, 9,10,4,1,13,14,6,10];
$csort->counting_sort($array, max($array));
?>