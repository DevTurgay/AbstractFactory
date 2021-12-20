<?php

namespace Encryption\Vigenere;

class VigenereDecryptor extends VigenereCore implements \Encryption\AbstractDecryptor
{
	public function decrypt($text, $key) : string
	{
		$encryptedArr = str_split($text);	// Inputun simvollarından ibarət massiv
		$fullKeyArr = str_split($this->generateFullKey($text,$key)); // Tam açarın simvollarından ibarət massiv

		$decryptedArr = [];
		foreach ($encryptedArr as $i => $value) {
			foreach ($this->VigenereTable as $a => $value1) {
				if($value1[$fullKeyArr[$i]] == $encryptedArr[$i]){
					$decryptedArr[$i] = $a;
					break;
				}
			}
		}
		return implode('',$decryptedArr);
	}
}
