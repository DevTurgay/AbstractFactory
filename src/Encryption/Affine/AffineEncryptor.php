<?php

namespace Encryption\Affine;

class AffineEncryptor extends AffineCore implements \Encryption\AbstractEncryptor
{
	public function encrypt($text, $affineNums = [1,2]) : string
	{
		$textArr = str_split($text);
		$encryptedText = '';
		foreach ($textArr as $key => $value) {
			$encryptedText .= $this->getEncryptedSymbol($value,$affineNums);
		}
		return $encryptedText;
	}
}
