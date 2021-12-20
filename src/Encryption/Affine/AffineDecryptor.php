<?php

namespace Encryption\Affine;

class AffineDecryptor extends AffineCore implements \Encryption\AbstractDecryptor
{
	public function decrypt($encryptedText, $affineNums) : string
	{
		$textArr = str_split($encryptedText);
		$decryptedText = '';
		foreach ($textArr as $key => $value) {
			$decryptedText .= $this->getDecryptedSymbol($value,$affineNums);
		}
		return $decryptedText;
	}
}
