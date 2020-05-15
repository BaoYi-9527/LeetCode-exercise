<?php
/*
给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。

如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。

您可以假设除了数字 0 之外，这两个数都不会以 0 开头。

示例：
输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
输出：7 -> 0 -> 8
原因：342 + 465 = 807

 */
/**
* Definition for a singly-linked list.
* class ListNode {
*     public $val = 0;
*     public $next = null;
*     function __construct($val) { $this->val = $val; }
* }
*/
class Solution {

	/**
	* @param ListNode $l1
	* @param ListNode $l2
	* @return ListNode
	*/
	function addTwoNumbers($l1, $l2) {
		$add = 0;
		$list = new ListNode(0);
		$cur = $list;
		while($l1||$l2){
			$x = $l1 != null ? $l1->val : 0;
			$y = $l2 != null ? $l2->val : 0;

			$val = ($x + $y + $add) % 10;

			$add =(int)(($x + $y + $add) / 10);

			$new = new ListNode($val);
			$cur->next = $new;
			$cur = $cur->next;

			if($l1 != null){
				$l1 = $l1->next;
			}  
			if ($l2 != null) {
				$l2 = $l2->next;
			}
		}
		if ($add > 0) {
			$cur->next = new ListNode($add);
		}
		return $list->next;
	}
}



/*
解题思路：
1.先创建一个变量add 和一个链表 list用来存放最后的和
2.将俩个链表进行循环，判断当前循环中的链表数据是否为空
3.创建变量 val 保存俩数以及前一循环中add的和，并将和对10进行取模，这样当和大于10时就可以取到其个位数
4.变量 add 用于保存当和大于10时，将其和的值除以10，因为为整数运算，最终会保留其十位数的数字(也就是用来判断是否存在进位情况)，需要注意的是此处需要对结果进行转换为整型的操作
5.创建一个和的链表，将当前链表 cur 的下一个指针指向该链表；然后将当前链表再次定义为 cur ，相当于将 cur 的next指针向后移动了一个，在其中间插入了一个 val
6.判断是否到达了链表的尾部，若此时链表循环的数据依旧不为空，则循环下一个数据
7.然后判断最后一个数据在求和之后是否会产生进位操作
8.返回和的链表

ps:
这里翻看过php手册后发现，很有趣的一点在于：
除法运算符总是返回浮点数，只有当俩个数都是整数并且恰当能够整除时才会返回一个整数；
而取模运算符在运算之前会将操作数转换称为整数，即除去小数部分。

 */