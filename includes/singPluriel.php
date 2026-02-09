<?php
function singPluriel ($a){
	if ($a == 0 || $a == 1) {
		return 'pt';
	}
	else{
		return 'pts';
	}
}
?>