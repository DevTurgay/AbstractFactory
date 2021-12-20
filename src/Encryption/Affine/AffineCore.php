<?php

namespace Encryption\Affine;

class AffineCore
{
	/*
	Affine Logic:

	@var a 		=> number1
	@var b 		=> number2
	@var symbol => ASCII code of symbol to be encrypted

	$newSymbol	 	= $x = $a*symbol+b
	$originalSymbol = $a = ($x-b)/symbol
	*/
	
	protected function getEncryptedSymbol($symbol, $affineNums)
	{
		$code = ord($symbol);
		return chr($code*$affineNums[0]+$affineNums[1]);
	}
	protected function getDecryptedSymbol($symbol, $affineNums)
	{
		$code = ord($symbol);
		return chr(abs($code-$affineNums[1])/$affineNums[0]);
	}
}
