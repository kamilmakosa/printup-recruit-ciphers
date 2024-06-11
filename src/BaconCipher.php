<?php

class BaconCipher extends BaseSubstitutionCipher
{
    public function __construct()
    {
        $lookupTable = [
            'A' => 'AAAAA',
            'B' => 'AAAAB',
            'C' => 'AAABA',
            'D' => 'AAABB',
            'E' => 'AABAA',
            'F' => 'AABAB',
            'G' => 'AABBA',
            'H' => 'AABBB',
            'I' => 'ABAAA',
            'J' => 'ABAAA', // same like I
            'K' => 'ABAAB',
            'L' => 'ABABA',
            'M' => 'ABABB',
            'N' => 'ABBAA',
            'O' => 'ABBAB',
            'P' => 'ABBBA',
            'Q' => 'ABBBB',
            'R' => 'BAAAA',
            'S' => 'BAAAB',
            'T' => 'BAABA',
            'U' => 'BAABB',
            'V' => 'BAABB', // same like U
            'W' => 'BABAA',
            'X' => 'BABAB',
            'Y' => 'BABBA',
            'Z' => 'BABBB'
        ];

        parent::__construct($lookupTable);
    }

    public function encrypt(string $text): string
    {
        $text = strtoupper(preg_replace('/[^A-Za-z]/', '', $text));

        return $this->substitute($text, $this->lookupTable);
    }

    public function decrypt(string $text): string
    {
        $text = strtoupper(preg_replace('/[^ABab]/', '', $text));

        $lookupTable = array_flip($this->lookupTable);
        $result = '';

        foreach (str_split($text, 5) as $char) {
            if (isset($lookupTable[$char])) {
                $result .= $lookupTable[$char];
            }
        }

        return $result;
    }
}
