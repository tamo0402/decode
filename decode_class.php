<?php


/*
 * �Í�����ǂ���N���X�B
 */
class Decode_Class {
	
	
	// ��Ǘp�z��
	private $decodeList_k = array(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z);
	private $decodeList_g = array(z,y,x,w,v,u,t,s,r,q,p,o,n,m,l,k,j,i,h,g,f,e,d,c,b,a);
	
	/*
	 * �R���X�g���N�^�B
	 */
	public function __construct() {
	}
	
	
	/*
	 * �Í�����ǂ���N���X�B
	* @param String �Í�
	* @return String ��ǂ��ꂽ�����B
	*/
	public function getDecodeString($inp_str, $inp_int) {
		
		// ����������B
		if (bcmod($inp_int, 2) == 0) {
			// �����@�~���B
			return $this->decode_guusuu($inp_str, $inp_int);
			
		} else {
			// ��@�����B
			return $this->decode_kisuu($inp_str, $inp_int);
		}
	}
	
	
	/*
	 * �����̃f�R�[�h�B
	 */
	private function decode_guusuu($inp_str, $inp_int) {
		
		// �Í�������̐����擾�B�@26
		$cnt = count($this->decodeList_g);
		
		// �Í��������Í�������̐��ȓ��ɂȂ�܂ň����B
		if ($inp_int >= $cnt) {
    		$decodeInt = bcmod($inp_int, $cnt);
		} else {
			$decodeInt = $inp_int;
		}
		
		// �Í���������ɂ��ČJ��オ�鎞�̏����B
		$inputStrNo = array_keys($this->decodeList_g, $inp_str);
		$getNo = $decodeInt + $inputStrNo[0];
		if ($cnt <= $getNo) {
			$getNo -= $cnt;
		}
		return $this->decodeList_g[$getNo];
	}
	
	/*
	 * ��̃f�R�[�h�B
	*/
	private function decode_kisuu($inp_str, $inp_int) {
	
		// �Í�������̐����擾�B�@26
		$cnt = count($this->decodeList_k);
		
	    // �Í��������Í�������̐��ȓ��ɂȂ�܂ň����B
		if ($inp_int >= $cnt) {
    		$decodeInt = bcmod($inp_int, $cnt);
		} else {
			$decodeInt = $inp_int;
		}
		
		// �Í���������ɂ��ČJ��オ�鎞�̏����B
		$inputStrNo = array_keys($this->decodeList_k, $inp_str);
		$getNo = $decodeInt + $inputStrNo[0];
		
		if ($cnt <= $getNo) {
			$getNo -= $cnt;
		}
		return $this->decodeList_k[$getNo];
	}
}