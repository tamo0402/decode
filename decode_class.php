<?php


/**
 * 暗号を解読するクラス。
 */
class Decode_Class {


    // 解読用配列
    private $decodeList_k = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    private $decodeList_g = array("z","y","x","w","v","u","t","s","r","q","p","o","n","m","l","k","j","i","h","g","f","e","d","c","b","a");

    // 暗号文字列。
    private $inputStr;
    private $inputInt;
    private $inputList;
    private $decodeList;


    /**
     * コンストラクタ。
     */
    public function __construct($inp_str) {
        $this->inputStr = trim($inp_str);
        $this->inputList = preg_split("/([a-z])/", $this->inputStr, null, PREG_SPLIT_DELIM_CAPTURE);
    }


    /**
     * 暗号を解読するクラス。
     * @param String 暗号
     * @return String 解読された文字。
     */
    public function decode() {
        $answer = '';
        foreach ($this->inputList as $input) {
            if ($input == "") {
                // なんか最初に空文字入っちゃうので。
            } else if (preg_match("/^[a-z]/", $input)) {
                $this->inputStr = $input;
            } else {
                $this->inputInt = $input;
                // 偶数か奇数か。(ここがひっかけ？ %で割るとINT型までの範囲しかできないっぽいPHPだけ？）
                if (bcmod($this->inputInt, 2) == 0) {
                    // 偶数　降順。
                    $this->decodeList = $this->decodeList_g;
                } else {
                    // 奇数　昇順。
                    $this->decodeList = $this->decodeList_k;
                }
                $answer .= $this->_decode();
            }
        }
        return $answer;
    }


    /**
     * デコード処理をする。
     */
    private function _decode() {

        // 暗号文字列の数を取得。　26
        $cnt = count($this->decodeList);
        $decodeInt = 0;

        // 暗号数字が暗号文字列の数以内になるまで引く。
        if ($this->inputInt >= $cnt) {
            $decodeInt = bcmod($this->inputInt, $cnt);
        } else {
            $decodeInt = $this->inputInt;
        }

        // 暗号文字を基準にして繰り上がる時の処理。
        $inputStrNo = array_keys($this->decodeList, $this->inputStr);
        $getNo = $decodeInt + $inputStrNo[0];
        if ($cnt <= $getNo) {
            $getNo -= $cnt;
        }
        return $this->decodeList[$getNo];
    }
}