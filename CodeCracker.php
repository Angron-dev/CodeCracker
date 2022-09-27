<?php

declare (strict_types=1);

namespace App;

class CodeCracker 
{   
    public array $encodeSings = ["!", ")", '"', "(", "£", "*", "%", "&", ">", "<", "@", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o"];
    public array $decodeSings = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

    public function decode(string $inputValue):string
    {
       return $this->logic($inputValue, $this->encodeSings, $this->decodeSings);
    }

    public function encode(string $inputValue):string
    {
       return $this->logic($inputValue, $this->decodeSings,$this->encodeSings);
    }

    public function logic(string $inputValue, array $codeKey, array $codedSings):string
    {
        $inputValueArray= mb_str_split(strtolower($inputValue));

        foreach ($inputValueArray as $letter) {
            if (in_array($letter, $codeKey)) {
                for ($i=0; $i < count($codeKey); $i++) { 
                    if ($letter === $codeKey[$i]) {
                        $outputMessage[] = $codedSings[$i]; 
                    }
                }
            }else{
                $outputMessage[] = $letter;
            }
        }
        return htmlspecialchars(implode($outputMessage));
    }
}

$message = new CodeCracker();
echo $message->decode(')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£');
echo $message->encode('Zażółć, gęślą jaźń.');