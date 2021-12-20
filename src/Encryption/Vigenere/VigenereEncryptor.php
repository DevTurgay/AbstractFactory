<?php

namespace Encryption\Vigenere;

use Error;
use ErrorException;
use Exception;

class VigenereEncryptor extends VigenereCore implements \Encryption\AbstractEncryptor
{
	public function encrypt($text, $key) : string{
		$inputArr = str_split($text);	// Inputun simvollarından ibarət massiv
		$fullKeyArr = str_split($this->generateFullKey($text,$key)); // Tam açarın simvollarından ibarət massiv

		$encryptedArr = [];
		foreach ($inputArr as $i => $value) {
				$encryptedArr[$i] = $this->VigenereTable[$value][$fullKeyArr[$i]] ?? "false"; // False used as string here because the value might be 0
				if($encryptedArr[$i] === "false"){
					throw new ErrorException("Vigenere: An unlisted symbol used : $value");
				}
		}
		return implode('',$encryptedArr);
	}
}
