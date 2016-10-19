<?php
$url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $_POST['placeid'] . '&key=AIzaSyCsfvCuj2PF1zJT6tH8zm2vFvarMEEXRoM';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
if( ! $result = curl_exec($ch)) {
    return false;
}
curl_close($ch);

// get result of dhl api call
print_r($result);


?>