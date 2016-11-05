<?php
function move($n, $from, $to, $use) {
	if($n == 1) {
		echo "Moving disc $n from $from to $to<br>";
	} else {
		move($n-1,$from,$use,$to);
		echo "Moving disc $n from $from to $to<br>";
		move($n-1,$use,$to,$from);
	}
}
move(3, "A", "C", "B");
?>