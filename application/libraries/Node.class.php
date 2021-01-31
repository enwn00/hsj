<?php
class Node {
  private $data;
  private $next;

  public function __construct(){
    $this->data = 0; // 노드의 정보
    $this->naxt = null; // 노드에 연결되어 있는 다음 노드의 위치
  }

  public function setData($data): void{ // 리턴: 없음
    $this->data = $data;
  }
  
  public function getData(): string{ // 리턴: 문자열
    debugPrint($this->data);
    return $this->data;
  }

  public function setNext($next): void{ // 리턴: 없음
    $this->next = $next;
  }

  public function getNext(){
    return $this->next;
  }
}