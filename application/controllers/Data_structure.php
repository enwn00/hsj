<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_structure extends CI_Controller {
	public function __construct() {
		$this->CI = &get_instance();
	}

	// 단순 구조
	private $int = 1; // 범위: -2,147,483,648 ~ + 2,147,483,647(32비트&4바이트), -9,223,372,036,854,775,807 ~ + 9,223,372,036,854,775,807(64비트&8바이트)
	private $float = 3.14;
	private $string = '리자몽'; // 최대 2GB의 크기를 가질 수 있다.

	// 선형 구조
	// 1. 리스트 (https://2dubbing.tistory.com/53)
	/**
	 *  선형 리스트(Linear List)
	 *
	 *  이동횟수: (추가하기 이전의 마지막 원소의 인덱스) - (추가할 인덱스) + 1
	 *	만약, 총 100개의 데이터가 저장되어 있는 선형 리스트에서 2번째 공간에 새로운 데이터를 추가하게 된다면 데이터 이동 횟수는 100 - 2 + 1 로, 총 99회 이동해야 한다.
	 * 	자료의 개수가 n개 일때, 삽입시 평균 이동 횟수 : n+1/2
	 *
	 * 	이동횟수: (마지막 원소의 인덱스) - (삭제한 원소의 인덱스)
	 * 	총 100개의 데이터가 저장되어 있는 선형 리스트에서 40번째 위치에 있는 데이터를 삭제한다면 데이터의 이동 횟수는 100 - 40 으로, 데이터 이동 횟수는 60회가 된다.
	 *	자료의 개수가 n개 일때, 삭제시 평균 이동 횟수 : n-1/2 
	 *
	 *  원소를 마지막에 추가하거나 삭제하면 가장 효율이 좋지만, 원소의 가장 첫번째 요소에 입력 및 삭제를 할시 가장 성능이 안 좋다.
	 *
	 *	구조가 가장 간단하고 탐색속도도 가장빠르고 편하다, 하지만 입력 및 삭제가시 엄청난 비효율적인 면모를 보인다.
	 */
	private $array = array(); 
	//private $SPLFArray = new SplFixedArray(100); // 고정 크기의 배열

	public function linked_list(){
		// http://127.0.0.1/index.php/data_structure/linked_list

		require_once APPPATH.'libraries/Linked_list.class.php';

		$linked_list = new Linked_list();
		/*
Data_structure->linked_list()
Linked_list Object
(
    [head:Linked_list:private] => Node Object
        (
            [data:Node:private] => 석중
            [next:Node:private] => Node Object
                (
                    [data:Node:private] => 리자
                    [next:Node:private] => Node Object
                        (
                            [data:Node:private] => 쿠캣
                            [next:Node:private] => Node Object
                                (
                                    [data:Node:private] => PHP
                                    [next:Node:private] => 
                                    [naxt] => 
                                )

                            [naxt] => 
                        )

                    [naxt] => 
                )

            [naxt] => 
        )

)
*/
		// $linked_list->insertNodeNext("석중");
		// $linked_list->insertNodeNext("리자");
		// $linked_list->insertNodeNext("쿠캣");
		// $linked_list->insertNodeNext("PHP");

/*
Data_structure->linked_list()
Linked_list Object
(
    [head:Linked_list:private] => Node Object
        (
            [data:Node:private] => PHP
            [next:Node:private] => Node Object
                (
                    [data:Node:private] => 쿠캣
                    [next:Node:private] => Node Object
                        (
                            [data:Node:private] => 리자
                            [next:Node:private] => Node Object
                                (
                                    [data:Node:private] => 석중
                                    [next:Node:private] => 
                                    [naxt] => 
                                )

                            [naxt] => 
                        )

                    [naxt] => 
                )

            [naxt] => 
        )

)
*/
		//$linked_list->insertNodePrev("석중");
		//$linked_list->insertNodePrev("리자");
		//$linked_list->insertNodePrev("쿠캣");
		//$linked_list->insertNodePrev("PHP");
/*
Linked_list Object
(
    [head:Linked_list:private] => Node Object
        (
            [data:Node:private] => 석중
            [next:Node:private] => Node Object
                (
                    [data:Node:private] => 리자
                    [next:Node:private] => Node Object
                        (
                            [data:Node:private] => 천재
                            [next:Node:private] => Node Object
                                (
                                    [data:Node:private] => 쿠캣
                                    [next:Node:private] => Node Object
                                        (
                                            [data:Node:private] => PHP
                                            [next:Node:private] => 
                                            [naxt] => 
                                        )

                                    [naxt] => 
                                )

                            [naxt] => 
                        )

                    [naxt] => 
                )

            [naxt] => 
        )

)
*/
		//$linked_list->insertNodeNext("석중");
		//$linked_list->insertNodeNext("리자");
		//$linked_list->insertNodeNext("쿠캣");
		//$linked_list->insertNodeNext("PHP");
		//$linked_list->insertNextSpecificNode("천재", "리자");
/*
Linked_list Object
(
    [head:Linked_list:private] => Node Object
        (
            [data:Node:private] => 석중
            [next:Node:private] => Node Object
                (
                    [data:Node:private] => 천재같은
                    [next:Node:private] => Node Object
                        (
                            [data:Node:private] => 리자
                            [next:Node:private] => Node Object
                                (
                                    [data:Node:private] => 쿠캣
                                    [next:Node:private] => Node Object
                                        (
                                            [data:Node:private] => PHP
                                            [next:Node:private] => 
                                            [naxt] => 
                                        )

                                    [naxt] => 
                                )

                            [naxt] => 
                        )

                    [naxt] => 
                )

            [naxt] => 
        )

)
*/
		//$linked_list->insertNodeNext("석중");
		//$linked_list->insertNodeNext("리자");
		//$linked_list->insertNodeNext("쿠캣");
		//$linked_list->insertNodeNext("PHP");
		//$linked_list->insertPrevSpecificNode("천재같은", "리자");
/*
Linked_list Object
(
    [head:Linked_list:private] => Node Object
        (
            [data:Node:private] => 석중
            [next:Node:private] => Node Object
                (
                    [data:Node:private] => 리자
                    [next:Node:private] => Node Object
                        (
                            [data:Node:private] => PHP
                            [next:Node:private] => 
                            [naxt] => 
                        )

                    [naxt] => 
                )

            [naxt] => 
        )

)
*/
		//$linked_list->insertNodeNext("석중");
		//$linked_list->insertNodeNext("리자");
		//$linked_list->insertNodeNext("쿠캣");
		//$linked_list->insertNodeNext("PHP");
		//$linked_list->deleteNode("쿠캣");


		$linked_list->insertNodeNext("쿠캣");
		$linked_list->deleteNode("쿠캣");



		debugPrint($linked_list);

	}
}