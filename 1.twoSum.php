<?php
// 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那两个 整数，并返回他们的数组下标。
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */

    function twoSum($nums, $target) {
        $map = [];	//存放比对过的数据的下标
        for($i = 0; $i <= count($nums) - 1; $i++) {
        	$diff = $target - $nums[$i];
        	if (isset($map[$diff])) {
        		return [$map[$diff], $i];
        	}
        	$map[$nums[$i]] = $i;
        }
        return [0, 0];
    }
}

/*
解题思路：
假设给定：nums = [2, 7, 11, 15], target = 9
按照代码思路：
1.循环nums数组中的数据
$map = []; $i = 0; $diff = $targrt - $numes[$i] = 9 - 2 = 7;
$map数组中不存在该数据(7); 所以$map[2] = 0; 保存数据2的下标；
2.第二次循环
$i++ = 1; $diff = $target - $nums[$i] = 9 - 7 = 2;
$map数组中存在该数据，返回其对应的下标0，和$i=1, 即返回[0, 1];

 */