<?php

require_once APPPATH.'libraries/Node.class.php';
class Linked_list {
  private $head;

  public function __construct(){
  	$this->head = null;
  }

	// 링크드 리스트 뒤에 노드 연결 
	public function insertNodeNext($data): void{
		$newNode = new Node();
		$newNode->setData($data); // 새로 생성된 노드에 데이터 입력

		if (!$this->head) { // 링크드 리스트에 아무것도 연결되어 있지 않다면 그냥 노드 연결(첫번째 연결)
			$this->head = $newNode;
		}else{
			$currnetNode = $this->head;

			while ($currnetNode->getNext() != null) { // 마지막에 연결되어 있는 노드를 계속 가져온다.
				$currnetNode = $currnetNode->getNext();
			}

			$currnetNode->setNext($newNode);
		}
	}

	// 링크드 리스트 앞에 노드 연결
	public function insertNodePrev($data): void{
		$newNode = new Node();
		$newNode->setData($data); // 새로 생성된 노드에 데이터 입력

		if(!$this->head){
			$this->head = $newNode;
		}else{
			$newNode->setNext($this->head); // 새로 생성한 노드에 링크드 리스트를 연결
			$this->head = $newNode; // 링크드 리스트 제일 첫번째 위치를 새로 생성한 노드로 대체
		}
	}

	// 특정 노드 뒤에 노드 연결
	public function insertNextSpecificNode($data, $target): void{
		if ($this->head){
			$currnetNode = $this->head;
		  	while ($currnetNode->getData() != $target && $currnetNode->getNext() != null) { // 특정 노드가 아닌 맨 마지막 노드를 가져오기 위해서 돌린다.
		  		$currnetNode = $currnetNode->getNext();
		  	}

		  	if ($currnetNode->getData() == $target){
		  		$newNode = new Node();
			  	$newNode->setData($data);

			  	$currnetNodeNext = $currnetNode->getNext(); // temp역할
			  	$currnetNode->setNext($newNode); // 현재 위치의 노드에 새로 생성한 노드 기입
			  	$newNode->setNext($currnetNodeNext); // 새로 생성한 노드 다음에 현재위치에 있더 노드 주입
		  	}
		}  	
	}

	// 특정 노드 앞에 노드 연결
	public function insertPrevSpecificNode($data, $target): void{
		if($this->head){

			$currnetNode = $this->head;
			$prevNode = null;
			while ($currnetNode->getData() != $target && $currnetNode->getNext() != null){ // 특정 노드와 그 전 노드를 담는다.
				$prevNode = $currnetNode; // 전에 노드를 담는다.
				$currnetNode = $currnetNode->getNext(); // 특정 노드를 담는다.
			}

			if ($currnetNode->getData() == $target){
				$newNode = new Node();
				$newNode->setData($data);

				if ($prevNode){
					$prevNode->setNext($newNode); // 전에 담은 노드에 넣고자 하는 노드를 넣는다.
					$newNode->setNext($currnetNode); // 전에 담은 노드 다음에 찾고자 하는 노드를 담는다.
				}else{
					$prevNode = $newNode;
					$prevNode->setNext($currnetNode);
					$this->head = $prevNode;
				}
			}
		}
	}

	public function deleteNode($target): bool{
		if ($this->head) {
			$currnetNode = $this->head;
			$prevNode = null;

			while ($currnetNode->getData() != $target && $currnetNode->getNext() != null){ // 특정 노드와 그 전 노드를 담는다.
				$prevNode = $currnetNode; // 전에 노드를 담는다.
				$currnetNode = $currnetNode->getNext(); // 특정 노드를 담는다.
			}

			if ($currnetNode->getData() == $target){
				if($prevNode){
					$prevNode->setNext($currnetNode->getNext()); // 현재 노드의 다음 연결되는 노드를 넣는다.
					unset($currnetNode); // 현재 노드를 삭제 함으로써 건너 뛴다.
				} else {
					// 지울 타겟이 본인 일때
					$this->head = $currnetNode->getNext();
					unset($currnetNode);
				}
				return true;
			}

			// 지울 타겟이 없을경우
			return false;
		}
	}
}