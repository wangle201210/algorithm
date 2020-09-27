<?php

test(1000000);
function quick_sort(array $arr): array
{
	$len = count($arr);
	if ($len < 2) {
		return $arr;
	}
	$mid = $arr[0];
	$left = [];
	$right = [];
	for ($i = 1; $i < $len; $i++) {
		if ($arr[$i] < $mid) {
			$left[] = $arr[$i];
		} else {
			$right[] = $arr[$i];
		}
	}
	$left = quick_sort($left);
	$right = quick_sort($right);
	return array_merge($left,[$mid],$right);
}

function test($count = 100)
{
	$peak = memory_get_usage();
	$startAt = microtime(true);
	$arr = [];
	for ($i = 0; $i < $count; $i++) {
		$arr[$i] = mt_rand(0,$count);
	}
	$arr = quick_sort($arr);
	for ($i = 1; $i < $count; $i++) { 
		if ($arr[$i] < $arr[$i - 1]) {
			print_r($arr);
			exit("验证未通过！");
		}
	}
	$timeUsed = (microtime(true)-$startAt) * 1000;
	$peak = (memory_get_usage() - $peak)/(1 << 20);
	print("验证通过！\n内存使用：".$peak."M,\n"."耗时：".$timeUsed."ms\n");
}
