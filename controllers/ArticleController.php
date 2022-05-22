<?php
function getArticleById($item)
{
    $url = "https://www.partykungen.se/{$item}.json";
    $httpCode = getHttpResponseCode($url);
    if ($httpCode == "200") {
        return file_get_contents($url);
    }
    else if ($httpCode == "404") {
        return "Error: Den artikeln verkar inte finnas :(";
    }
    else {
        return "Error: Något gick fel, försök igen";
    }
}

function getHttpResponseCode($url)
{
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}