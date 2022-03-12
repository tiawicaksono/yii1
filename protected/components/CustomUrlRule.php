<?php

class CustomUrlRule extends CBaseUrlRule {
    var $skey = "key123456789"; // you can change it

    public function createUrl($manager, $route, $params, $ampersand) {
        $paramString = array();
        foreach ($params as $key => $value) {
            $paramString[] = $key;
            $paramString[] = $value;
        }
        
        //
        /*$urlsParams = array();
        foreach ($params as $p => $param) {
            $urlsParams[] = $this->encode($param);
        }
        $newStringEncoded = implode('/', $urlsParams);*/
        //
            
            
        $paramString = implode(",", $paramString);
        $paramStringEncoded = $this->encode($paramString);
        return $route . '/' . $paramStringEncoded;
        //return $route . '/' . $newStringEncoded;
    }
    
    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo) {
        
        $pathParams = explode("/", $pathInfo);
//        print_r($pathParams); exit;
        if(count($pathParams)>3) {
            
            if (isset($pathParams[3])) {
                $paramStringDecoded = $this->decode($pathParams[3]);
                $params = explode(",", $paramStringDecoded);
                //print_r($params); exit;
                for ($i = 0; $i < count($params); $i+= 2) {
    //                if (isset($params[$i])) {
                        $_GET[$params[$i]] = $params[$i + 1];
                        $_REQUEST[$params[$i]] = $params[$i + 1];
    //                }
                }
                 //if (isset($pathParams[2])) {
                 //   $paramStringDecodeds = $this->decode($pathParams[2]);
                    //echo $paramStringDecodeds; exit;
                 //   $params = explode(",", $paramStringDecodeds);
                //    for ($i = 0; $i < count($params); $i+= 2) {
        //                if (isset($params[$i])) {
                            $_GET[$params[$i]] = $params[$i + 1];
                            $_REQUEST[$params[$i]] = $params[$i + 1];
        //                }
               //     }
                //}
            }
            //print_r($_REQUEST); exit;
            
        }else {
            if (isset($pathParams[2])) {
                $paramStringDecoded = $this->decode($pathParams[2]);
                $params = explode(",", $paramStringDecoded);
                for ($i = 0; $i < count($params); $i+= 2) {
    //                if (isset($params[$i])) {
                        $_GET[$params[$i]] = $params[$i + 1];
                        $_REQUEST[$params[$i]] = $params[$i + 1];
    //                }
                }
            }
        }
        return $pathInfo;
    }
    
//    public function parseUrl($manager,$request,$pathInfo,$rawPathInfo)
//    {
//        if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches))
//        {
//            // check $matches[1] and $matches[3] to see
//            // if they match a manufacturer and a model in the database
//            // If so, set $_GET['manufacturer'] and/or $_GET['model']
//            // and return 'car/index'
//        }
//        return false;  // this rule does not apply
//    }
    public function safe_b64encode($string) {

        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode($value, $condition = false) {
//        print_r($value);
        if (!$value) {
            return false;
        }
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        if ($condition === true) {
            $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, "bcb04b7e103a0cd8", $text, MCRYPT_MODE_ECB, $iv);
        } else {
            $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        }    
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value) {

        if (!$value) {
            return false;
        }
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }

}

?>
