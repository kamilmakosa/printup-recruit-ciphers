<?php

class AtBashCipher extends BaseSubstitutionCipher
{
    public function __construct()
    {
        $lookupTable = [
            'A' => 'Z',
            'B' => 'Y',
            'C' => 'X',
            'D' => 'W',
            'E' => 'V',
            'F' => 'U',
            'G' => 'T',
            'H' => 'S',
            'I' => 'R',
            'J' => 'Q',
            'K' => 'P',
            'L' => 'O',
            'M' => 'N',
            'N' => 'M',
            'O' => 'L',
            'P' => 'K',
            'Q' => 'J',
            'R' => 'I',
            'S' => 'H',
            'T' => 'G',
            'U' => 'F',
            'V' => 'E',
            'W' => 'D',
            'X' => 'C',
            'Y' => 'B',
            'Z' => 'A',
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
        $text = strtoupper(preg_replace('/[^A-Za-z]/', '', $text));

        return $this->substitute($text, array_flip($this->lookupTable));
    }
}
