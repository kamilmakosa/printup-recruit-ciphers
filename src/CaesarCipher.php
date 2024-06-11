<?php

class CaesarCipher extends BaseSubstitutionCipher
{
    public function __construct($shift)
    {
        $lookupTable = $this->createLookupTable($shift % 26);

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

    private function createLookupTable(int $shift): array
    {
        $alphabet = range('A', 'Z');
        $codingArray = array_merge(array_slice($alphabet, $shift), array_slice($alphabet, 0, $shift));
        
        return array_combine($alphabet, $codingArray);
    }
}