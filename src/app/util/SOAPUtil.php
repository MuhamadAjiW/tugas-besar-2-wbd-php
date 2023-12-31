<?php

namespace app\util;

use app\core\Request;
use config\AppConfig;
use config\SOAPConfig;

Class SOAPUtil{
    private function getEnvelope($method, $args){
        $envelope = '<?xml version="1.0" encoding="utf-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tns="' . SOAPConfig::getService() . '/">
<soapenv:Header/>
<soapenv:Body>';

        $envelope .= "\n<tns:" . $method . ">\n";

        //translate this part from $args
        if($args != null){
            foreach ($args as $key => $value) {
                $envelope .= '<' . $key . '>' . $value . '</' . $key . ">\n";
            }
        }


        $envelope .= "\n</tns:" . $method . ">\n";

        $envelope .= '</soapenv:Body>
</soapenv:Envelope>';

        return $envelope;
    }

    public function sendRequest($endpoint, $handler, $method, $args){
        $url = SOAPConfig::getURL() . $endpoint;
        
        // TODO: Delete later
        // echo $url . "<br>";

        $data = $this->getEnvelope($method, $args);
        
        // echo "Sent data: <br>";
        // echo htmlspecialchars($data) . "<br>";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: text/xml;charset=UTF-8',
            'SOAPAction: '. SOAPConfig::getService() . '/' . $handler . '/' . $method,
            'Authorization: Bearer ' . AppConfig::getToken(),
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        
        
        
        $response = curl_exec($ch);
        // echo "<br>Raw:<br>";
        // echo htmlspecialchars($response);
        
        if (curl_errno($ch)){
            echo "Curl error: " . curl_error($ch);
        }
        
        curl_close($ch);
        if ($response !== false) {
            $response_group = $method . "Response";
            $clean_xml = str_ireplace(['SOAP-ENV:', 'SOAP:', 'S:', 'ns2:', ':xsi', 'xsi:'], '', $response);
            $responseData = simplexml_load_string($clean_xml)->Body->$response_group->return;
            $returnValue = json_decode(json_encode($responseData), true);
            if(isset($returnValue['data'])){
                // Convert to array if it's not already
                if (!isset($returnValue['data'][0])) {
                    $returnValue['data'] = [$returnValue['data']];
                }
            }
            if(isset($returnValue['valid'])){
                $returnValue['valid'] = $returnValue['valid'] === 'true';
            }

            // TODO: Delete later
            // echo "<br><br>Result:<br>";
            // echo htmlspecialchars($clean_xml);
            // echo "<br>parsed:<br>";
            // var_dump($returnValue);

            return $returnValue;
        } else {
            echo '<br><br>Failed to retrieve data from the API.';
        }
    }

    public function testRequest(){
        $data = [
            "user_id" => "4",
            "author_id" => "4",
        ];

        $this->sendRequest("/api/subscribe", 'SubscriptionService', 'subscribeRequest', $data);
    }
}

?>