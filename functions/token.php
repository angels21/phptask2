<?php



function generate_token(){
    $token = "";

    $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','&','@','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','5','6','7','8','9','#','!','?','$','%'];
    for($i = 0 ; $i < 26 ; $i++){

        //get a random number, get elements in alphabets, add that to token string
        $index = mt_rand(0,count($alphabets)-1);
        $token .= $alphabets[$index];
    }
    return $token;
}

function find_token($email = ''){
    $allUserTokens = scandir("db/token/"); //return @array (2 filled)
    $countAllUserTokens = count($allUserTokens);

    for ($counter = 0; $counter < $countAllUserTokens ; $counter++) {
        $currentTokenFile = $allUserTokens[$counter];
    
        
        
        if($currentTokenFile == $email . ".json"){
            //check for if token in current token file is same as $token
            $tokenContent = file_get_contents("db/token/".$currentTokenFile);
            
            $tokenObject = json_decode($tokenContent);
            //$tokenFromDB = $tokenObject->token;

            return $tokenObject;
        }
    }
    return false;
}
