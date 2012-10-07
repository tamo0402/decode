<?php


/*
 * 暗号を解読するクラス。
 */
class Decode_Class {
	
	
	// 解読用配列
	private $decodeList_k = array(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z);
	private $decodeList_g = array(z,y,x,w,v,u,t,s,r,q,p,o,n,m,l,k,j,i,h,g,f,e,d,c,b,a);
	
	/*
	 * コンストラクタ。
	 */
	public function __construct() {
	}
	
	
	/*
	 * 暗号を解読するクラス。
	* @param String 暗号
	* @return String 解読された文字。
	*/
	public function getDecodeString($inp_str, $inp_int) {
		
		// 偶数か奇数か。
		if (bcmod($inp_int, 2) == 0) {
			// 偶数　降順。
			return $this->decode_guusuu($inp_str, $inp_int);
			
		} else {
			// 奇数　昇順。
			return $this->decode_kisuu($inp_str, $inp_int);
		}
	}
	
	
	/*
	 * 偶数のデコード。
	 */
	private function decode_guusuu($inp_str, $inp_int) {
		
		// 暗号文字列の数を取得。　26
		$cnt = count($this->decodeList_g);
		
		// 暗号数字が暗号文字列の数以内になるまで引く。
		if ($inp_int >= $cnt) {
    		$decodeInt = bcmod($inp_int, $cnt);
		} else {
			$decodeInt = $inp_int;
		}
		
		// 暗号文字を基準にして繰り上がる時の処理。
		$inputStrNo = array_keys($this->decodeList_g, $inp_str);
		$getNo = $decodeInt + $inputStrNo[0];
		if ($cnt <= $getNo) {
			$getNo -= $cnt;
		}
		return $this->decodeList_g[$getNo];
	}
	
	/*
	 * 奇数のデコード。
	*/
	private function decode_kisuu($inp_str, $inp_int) {
	
		// 暗号文字列の数を取得。　26
		$cnt = count($this->decodeList_k);
		
	    // 暗号数字が暗号文字列の数以内になるまで引く。
		if ($inp_int >= $cnt) {
    		$decodeInt = bcmod($inp_int, $cnt);
		} else {
			$decodeInt = $inp_int;
		}
		
		// 暗号文字を基準にして繰り上がる時の処理。
		$inputStrNo = array_keys($this->decodeList_k, $inp_str);
		$getNo = $decodeInt + $inputStrNo[0];
		
		if ($cnt <= $getNo) {
			$getNo -= $cnt;
		}
		return $this->decodeList_k[$getNo];
	}
}