<?php
#
# Copyright (c) 2007 by Herbert Straub
# 
# 2007-11-10 Herbert Straub
#	- normalized values and units + trend graph
#
function helper_value ($size) {
	if ($size > 1000000000000) {
		$pmax=$size/1000000000000;
	}
	elseif ($size > 1000000000) {
		$pmax=$size/1000000000;
	}
	elseif ($size > 1000000) {
		$pmax=$size/1000000;
	}
	elseif ($size > 1000) {
		$pmax=$size/1000;
	} else {
		$pmax=$size/1000;
	}
	return $pmax;
}
function helper_unit ($size) {
	if ($size > 1000000000000) {
		$pmaxeh='TB';
	}
	elseif ($size > 1000000000) {
		$pmaxeh='GB';
	}
	elseif ($size > 1000000) {
		$pmaxeh='MB';
	}
	elseif ($size > 1000) {
		$pmaxeh='kB';
	} else {
		$pmaxeh='B';
	}
	return $pmaxeh;
}
