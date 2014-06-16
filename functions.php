<?php
    $characters = array(
        1 => 'A',                    
        2 => 'B',
        3 => 'C',
        4 => 'D',
        5 => 'E',
        6 => 'F',
        7 => 'G',
        8 => 'H',
        9 => 'I',
        10 => 'J',
        11 => 'K',
        12 => 'L',
        13 => 'M',
        14 => 'N',
        15 => 'O',
        16 => 'P',
        17 => 'Q',
        18 => 'R',
        19 => 'S',
        20 => 'T',
        21 => 'U',
        22 => 'V',
        23 => 'W',
        24 => 'X',
        25 => 'Y',
        26 => 'Z',
        27 => 'a',
        28 => 'b',
        29 => 'c',
        30 => 'd',
        31 => 'e',
        32 => 'f',
        33 => 'g',
        34 => 'h',
        35 => 'i',
        36 => 'j',
        37 => 'k',
        38 => 'l',
        39 => 'm',
        40 => 'n',
        41 => 'o',
        42 => 'p',
        43 => 'q',
        44 => 'r',
        45 => 's',
        46 => 't',
        47 => 'u',
        48 => 'v',
        49 => 'w',
        50 => 'x',
        51 => 'y',
        52 => 'z',
        53 => '`',
        54 => '~',
        55 => '1',
        56 => '!',
        57 => '2',
        58 => '@',
        59 => '3',
        60 => '#',
        61 => '4',
        62 => '$',
        63 => '5',
        64 => '%',
        65 => '6',
        66 => '^',
        67 => '8',
        68 => '*',
        69 => '9',
        70 => '(',
        71 => '0',
        72 => ')',
        73 => '-',
        74 => '_',
        75 => '=',
        76 => '+',
        77 => '[',
        78 => '{',
        79 => ']',
        80 => '}',
        81 => '\\',
        82 => '|',
        83 => '\'', 
        84 => '"',
        85 => ';',
        86 => ':',
        87 => '/',
        88 => '?',
        89 => '.',
        90 => '>',
        91 => ',',
        92 => '<'        
    );
     
    //Converts a string into its numerical equivalent in the alphabet
    function StringToInt($str){
        global $characters; // Reference to the global variable
        //$upperCaseString = strtoupper($str);
        $array = str_split($str); //converting to array of char
        $arrayCount = count($array);

        $arrayInt = array(); 

        for($i=0; $i < $arrayCount; $i++){
            $character = $array[$i];

            reset($characters);                            
            while(list($key, $val) = each($characters)){				
                if($character == $val){
                    array_push($arrayInt, $key);
                    break;
                }
            }			
            
        }										
        return $arrayInt; 							
    }	                        

    //Converts the key into a list of strings
    function KeyToInt($key){                    
        $intKey = StringToInt($key); 
        return $intKey;
    }

    //Encrypts a string
    function Encrypt($strings, $key){
        $stringList = array();
        $encryptedString = "";                    

        foreach($strings as $value){ //maybe $value?
                $strToInt = StringToInt($value);
                //var_dump($strToInt);
                $keyToInt = KeyToInt($key);
                //var_dump($keyToInt);

                $newStrInt = array();	//Encrypted text in numbers	
                $counter = 0;
                foreach($strToInt as $number){						
                        $newNumber = $number + $keyToInt[$counter];
                        //var_dump($newNumber);
                        if($newNumber > 92){
                                $newNumber = $newNumber - 92;
                        }//end of if

                        array_push($newStrInt, $newNumber);
                        if($counter == (count($keyToInt) - 1)){
                                $counter = 0;
                        } else {
                                $counter++;
                        }//end of else									
                }//end of for


                $encryptedString = IntToString($newStrInt);
                array_push($stringList, $encryptedString);
        }
        return $stringList;
    } //End of Encrypt

    //Converts a list of int into a string
    function IntToString($list){                    
        global $characters;
        $str = "";
        $character = "";
        $listOfChar = array();        

        foreach($list as $number){
            reset($characters);                            
            while(list($key, $val) = each($characters)){				
                if($key == $number){
                    $character = $val; 
                    break;
                }
            }
            array_push($listOfChar, $character);
        }

        foreach($listOfChar as $character){
                $str = $str . $character;		
        }

        return $str;
    }                

    //Decrypts a string
    function Decrypt($strings, $key){			
        $decryptedString = "";                    
        $decryptedStrings = array();
        foreach($strings as $str){
                $strToInt = StringToInt($str);
                $keyToInt = KeyToInt($key);

                $newStrInt = array();	//Encrypted text in numbers	
                $counter = 0;                            
                foreach($strToInt as $number){						
                        $newNumber = $number - $keyToInt[$counter];
                        if($newNumber < 0){
                                $newNumber = $newNumber + 92;
                        }

                        array_push($newStrInt, $newNumber);
                        if($counter == (count($keyToInt) - 1)){
                                $counter = 0;                                         
                        } else {
                                $counter++;                                            
                        }									
                }//end of for

                $decryptedString = IntToString($newStrInt);                            
                array_push($decryptedStrings, $decryptedString);
        }
        return $decryptedStrings;                    
    }


?>
