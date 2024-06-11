<?php

abstract class BaseSubstitutionCipher implements CiphersContract
{
    protected $lookupTable;

    public function __construct(array $lookupTable)
    {
        $this->lookupTable = $lookupTable;
    }

    abstract public function encrypt(string $input): string;
    abstract public function decrypt(string $input): string;

    public function substitute(string $text, array $lookupTable)
    {
        $result = '';

        foreach (str_split($text) as $char) {
            if (isset($lookupTable[$char])) {
                $result .= $lookupTable[$char];
            }
        }

        return $result;
    }
}
