<?php

/**
 * @soap
 */
class GestionCompteUtilisateur {

    public static function sendCorsHeaders() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Authorization");
        header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");
    }

    /**
     * @soap
     * @return string
     */
    public function check() {
        // Retreive the authorization header
        if (!function_exists('apache_request_headers')) {
            function apache_request_headers() {
              $arh = array();
              $rx_http = '/\AHTTP_/';
              foreach($_SERVER as $key => $val) {
                if( preg_match($rx_http, $key) ) {
                  $arh_key = preg_replace($rx_http, '', $key);
                  $rx_matches = array();
                  // do some nasty string manipulations to restore the original letter case
                  // this should work in most cases
                  $rx_matches = explode('_', $arh_key);
                  if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
                    foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
                    $arh_key = implode('-', $rx_matches);
                  }
                  $arh[ucfirst(strtolower($arh_key))] = $val;
                }
              }
              return( $arh );
            }
        }
        $requestHeaders = apache_request_headers();
        $authorizationHeader = @$requestHeaders['AUTHORIZATION'];
        if ($authorizationHeader == null) {
          header('HTTP/1.0 401 Unauthorized');
          echo "No authorization header sent";
          exit();
        }
        // Validate the token
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $secret = 'QsJTRnA6ccboG-mNKKE4XsNc_RP2tvltBhfzzQ7_geow8Yz9Z5EZRk9XLkmMRgdQ';
        $decoded_token = null;
        try {
          $decoded_token = \JWT::decode($token, base64_decode(strtr($secret, '-_', '+/')) );
        } catch(UnexpectedValueException $ex) {
          header('HTTP/1.0 401 Unauthorized');
          echo "Invalid token";
          exit();
        }
        // Validate that this token was made for us
        if ($decoded_token->aud != 'BAZxb4JU6TN99UZ1bcJVepvmlMiCIxvR0') {
          header('HTTP/1.0 401 Unauthorized');
          echo "Invalid token";
          exit();
        }
    }
    
}