<?php

if(!function_exists('getAllRepoAuthUser')){
    function getAllRepoAuthUser($accessToken){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/user');

        curl_setopt($ch, CURLOPT_USERPWD, $accessToken . ':' . $accessToken);

        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/user/repos');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Accept: application/vnd.github.v3+json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        
        return json_decode($result);
    }
}