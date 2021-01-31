<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Algorithm extends CI_Controller {
	public function __construct() {
		$this->CI = &get_instance();
		$aNumbers = range(1, 100); // 1~100개의 숫자가 들어있는 배열 생성
		$outArray = array_rand($aNumbers, 10); // 랜덤으로 10개 추출
		shuffle($outArray); // 배열 섞기
		$this->out_array = $outArray; // 주문일을 현재 시간으로 지정
		$this->sum_count = 0; // 시간 복잡도 계산
		$this->size = sizeof($this->out_array); // 베열의 크기
	}


/*	
	public function index()
	{
		// http://127.0.0.1/index.php/algorithm
		debugPrint("Algorithm_index");
		$this->load->view('welcome_message');
	}
*/

	private function swap($x, $y){
		$sTemp = $this->out_array[$x];
		$this->out_array[$x] = $this->out_array[$y];
		$this->out_array[$y] = $sTemp;
	}

	// 버블정렬 (앞에서부터 점프 점프 하면서 값을 비교해서 순서를 바꾸는 형식)
	public function bubble_sort(){
		// http://127.0.0.1/index.php/algorithm/bubble_sort

		for ($x = 0; $x < $this->size-1; $x++){ // x는 그냥 배열의 크기만큼 돌아주는 역할밖에 안한다.
			//$bSwapped = FALSE;
			for ($y = 1; $y < $this->size-$x; $y++){ // 1부터 시작해서 자기보다 1작은 배열과 비교해서 작거나 크면 해당 배열과 변경 * 배열의 총 크기의 -1만큼 반복하면서
				if ($this->out_array[$y-1] > $this->out_array[$y]){
					self::swap($y-1, $y);
					//$bSwapped = TRUE;
				}
				 $this->sum_count++;
				//$this->sum_count += $y;
			}
			//if($bSwapped == FALSE) break; // 마지막에 조금더 돌기 위해서 지정
		}

		debugPrint($this->out_array);
		debugPrint($this->sum_count);
	}

	// 선택정렬
	public function selection_sort(){
		// http://127.0.0.1/index.php/algorithm/selection_sort

		for ($x = 0; $x < $this->size; $x++){
			for ($y = $x+1; $y < $this->size; $y++){
				if($this->out_array[$x] > $this->out_array[$y]){
					self::swap($x, $y);
				}
				$this->sum_count++;
			}
		}

		debugPrint($this->out_array);
		debugPrint($this->sum_count);
	}

	// 삽입정렬
	public function insertion_sort(){
		// http://127.0.0.1/index.php/algorithm/insertion_sort

		for ($x = 0; $x < $this->size; $x++){ // 수가 증가하면서
			$iTemp = $this->out_array[$x]; // 끝의 수를 임시로 저장한다.
			for($y = $x-1; $y >= 0; $y--) { // 끝에서 부터 1까지 돌린다. * 첫번째 -1값은 제외한다.
				if ($iTemp > $this->out_array[$y]) break; // 마지막의 수가 제일 크거나 작으면 그냥 for 문 종료
				$this->out_array[$y+1] = $this->out_array[$y]; // 조건에 맞지 않는 값을 다음 배열에 넣어버린다. 그러면서 자연스럽게 맨 앞에 위치하는 배열이 가장 크거나 작아진다.

				//$this->sum_count++;
	        }
	        $this->out_array[$y+1] = $iTemp; // 제일 크거나 작은 수를 마지막 위치에 지정
		}

		debugPrint($this->out_array);
		debugPrint($this->sum_count);
	}

	public function merge_sort(){
		// http://127.0.0.1/index.php/algorithm/merge_sort

	}

	public function quick_sort(){

	}
}
