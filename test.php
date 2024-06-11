<?php

require_once 'autoload.php';

$plaintext = "HelloWorld";

$atbash = new AtbashCipher();
echo "Atbash Cipher:\n";
echo "Encrypt: " . ($ciphertext = $atbash->encrypt($plaintext)) . "\n";
echo "Decrypt: " . ($decrypted = $atbash->decrypt($ciphertext)) . "\n";

if (strtoupper($plaintext) === $decrypted) {
    echo "Atbash Cipher: TEST PASSED\n\n";
}

$bacon = new BaconCipher();
echo "Bacon Cipher:\n";
echo "Encrypt: " . ($ciphertext = $bacon->encrypt($plaintext)) . "\n";
echo "Decrypt: " . ($decrypted = $bacon->decrypt($ciphertext)) . "\n";

if (strtoupper($plaintext) === $decrypted) {
    echo "Bacon Cipher: TEST PASSED\n\n";
}

// Przykładowe użycie
$caesar = new CaesarCipher(rand(1,26));
echo "Caesar Cipher:\n";
echo "Encrypt: " . ($ciphertext = $caesar->encrypt($plaintext)) . "\n";
echo "Decrypt: " . ($decrypted = $caesar->decrypt($ciphertext)) . "\n";

if (strtoupper($plaintext) === $decrypted) {
    echo "Caesar Cipher: TEST PASSED\n\n";
}
