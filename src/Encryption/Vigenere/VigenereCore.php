<?php

namespace Encryption\Vigenere;

class VigenereCore
{

	/**
	 * Vigenere algorithm might be found here
	 * https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
	 */

	private $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz 123456789"; // Symbols list can be enlarged as much as wished
	public $VigenereTable;
	private $fullKey;
	private $row;
	private $alphabetLen;

	function __construct()
	{
		$this->setAlphabetLen();
		$this->setAlphabetArr();
		$this->generateVigenereTable();
	}

	public function generateVigenereTable($parentKey = -1){	
		foreach ($this->alphabetArr as $i => $value) {
			if($parentKey == -1){		
				$this->row = [];
				$this->VigenereTable[$value] = $this->generateVigenereTable($i); // Recursion goes here
			}
			else{
				$theIndex = ($parentKey+$i)%strlen($this->alphabet); // If the last letter is used in Alphabet, begin from zero
				$this->row[$value] = $this->alphabetArr[$theIndex];

				if($i+1 == $this->alphabetLen) // When loop in recursion finished
					return $this->row;
			}
		}
		return $this->VigenereTable;
	}

	protected function generateFullKey($input, $key){
		$inputArr = str_split($input);	// Inputun simvollarından ibarət massiv
		$keyArr = str_split($key); // Açarın simvollarından ibarət massiv

		$fullKeyArr = [];

		foreach ($inputArr as $i => $value) {
			$keyIndex = $i;
			if(($i+1)>=count($keyArr))
				$keyIndex = $i%count($keyArr);
			$fullKeyArr[$i] = $keyArr[$keyIndex];
		}
		return implode('',$fullKeyArr);
	}

	private function setAlphabetLen() : void{
		$this->alphabetLen = strlen($this->alphabet);
	}

	private function setAlphabetArr() : void{
		$this->alphabetArr = str_split($this->alphabet);
	}

}
