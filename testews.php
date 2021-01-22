<?php
$soapUrl = "http://elstestserver.endicia.com/LabelService/EwsLabelService.asmx";
$xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
<soap12:Body>
<GetPostageLabel xmlns="www.envmgr.com/LabelService">
<LabelRequest Test="YES" ImageFormat="PDF">
<RequesterID>l=AccountNumber</RequesterID>
<AccountID>YourAccountNumber</AccountID>
<PassPhrase>passphrasestring</PassPhrase>
<MailClass>Priority</MailClass>
<DateAdvance>1</DateAdvance>
<WeightOz>4.1</WeightOz>
<MailpieceShape>Parcel</MailpieceShape>
<Stealth>TRUE</Stealth>
<PartnerCustomerID></PartnerCustomerID>
<PartnerTransactionID>1234567</PartnerTransactionID>
<ToName>Albert Thomson</ToName>
<ToAddress1>10581 Memorial Hwy</ToAddress1>
<ToCity>Tampa</ToCity>
<ToState>FL</ToState>
<ToPostalCode>33615</ToPostalCode>
<ToZIP4></ToZIP4>
<ToDeliveryPoint>00</ToDeliveryPoint>
<ToPhone></ToPhone>
<FromName>Ellen Gold</FromName>
<ReturnAddress1>66 Main St</ReturnAddress1>
<FromCity>Tampa</FromCity>
<FromState>FL</FromState>
<FromPostalCode>33615</FromPostalCode>
<FromZIP4></FromZIP4>
<FromPhone></FromPhone>
</LabelRequest>
</GetPostageLabel>
</soap12:Body></soap12:Envelope>';

$headers = array(
"POST /LabelService/EwsLabelService.asmx HTTP/1.1",
"Host: elstestserver.endicia.com",
"Content-Type: application/soap+xml; charset=utf-8",
"Content-Length: ".strlen($xml_post_string)
); 

$url = $soapUrl;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
echo $response;