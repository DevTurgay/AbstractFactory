<?php
/* The project is developed to demonstrate and practice "Abstract Factory" design pattern 
 * based on an Encryption library which provides encryption algorithms like:
 * Vigenere, Affine and AES.
 * 
 * This is the root file that can be claimed as an example of a client uses the lib.
 *
 * @author		Turgay Ali https://github.com/DevTurgay
 *
*/

spl_autoload_register(function ($class_name)
{
	// base directory for the namespace prefix
    $base_dir = str_replace('\\','/',__DIR__.'/src/');

	$file = '';
	$file = $base_dir . str_replace('\\', '/', $class_name) . '.php';

	if(file_exists($file))
		include_once $file;
});

// Sample of Vigenere
use Encryption\Vigenere\VigenereFactory;

$encryption = new VigenereFactory();
echo $encryptedString = $encryption->encryptor()->encrypt("SAMPLE TEXT","KEY");
echo '<br>';
echo $encryption->decryptor()->decrypt($encryptedString,"KEY");
// Vigenere End


// ------------
echo '<hr>';


// Sample of Affine
use Encryption\Affine\AffineFactory;

$encryption = new AffineFactory;
echo $encryptedString = $encryption->encryptor()->encrypt("Abc",[1,2]);
echo '<br>';
echo $encryption->decryptor()->decrypt($encryptedString,[1,2]);
// Affine End


// ------------
echo '<hr>';


// Sample of AES
use Encryption\AES\AESFactory;

$encryption = new AESFactory;

echo $encryptedString = $encryption->encryptor()->encrypt("Sample Text");
echo '<br>';
echo $encryption->decryptor()->decrypt($encryptedString);