<?php

// Ebubekir Bastama https://www.ebubekirbastama.com
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/guilds/{Kanalid}/bans');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: discord.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
$headers[] = 'Authorization: {Authorization}';
$headers[] = 'Cookie: {Cookie Verileri}';
$headers[] = 'Referer: {Referer Url}';
$headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"112\", \"Brave\";v=\"112\", \"Not:A-Brand\";v=\"99\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Gpc: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36';
$headers[] = 'X-Debug-Options: bugReporterEnabled';
$headers[] = 'X-Discord-Locale: tr';
$headers[] = 'X-Super-Properties: {X-Super-Properties}';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);
//print_r($result);

if (is_string($result)) {
    preg_match_all('/\d+/', $result, $matches);
    $ids = $matches[0];
    $seventeen_digit_ids = [];

    foreach ($ids as $id) {
        if (strlen($id) >= 11) {
            $seventeen_digit_ids[] = $id;
        }
    }

    foreach ($seventeen_digit_ids as $key => $value) {
        Temizle($value);
    }
}

function Temizle($id) {
    // Ebubekir Bastama https://www.ebubekirbastama.com
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/guilds/{Kanalid}/bans/' . $id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Authority: discord.com';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Language: tr-TR,tr;q=0.9';
    $headers[] = 'Authorization: {Authorization}';
    $headers[] = 'Cookie: {Cookie Verileri}';
    $headers[] = 'Origin: https://discord.com';
    $headers[] = 'Referer: {Referer Url}';
    $headers[] = 'Sec-Ch-Ua: \"Chromium\";v=\"112\", \"Brave\";v=\"112\", \"Not:A-Brand\";v=\"99\"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Gpc: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36';
    $headers[] = 'X-Debug-Options: bugReporterEnabled';
    $headers[] = 'X-Discord-Locale: tr';
    $headers[] = 'X-Super-Properties: {X-Super-Properties}';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);
}
