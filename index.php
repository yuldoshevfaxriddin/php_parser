<?php
$url = 'https://kun.uz';
$url_authored = 'https://kun.uz/authored';

require 'vendor/autoload.php';
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get($url_authored);
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);

$news_xpath = $xpath->evaluate('//div//div[@class="container"]//div//div[@id="news-list"]//div[@class="news"]');
// $images = $xpath->evaluate('//div//div//div//div//div[@id="news-list"]//div//div//a//img');
// $news_date = $xpath->evaluate('//div//div//div//div//div[@id="news-list"]//div//div//div[@class="news-meta"]//span');
// $news_link = $xpath->evaluate('//div//div//div//div//div[@id="news-list"]//div//div//a[@class="news__title"]');


var_dump($news_xpath[0]->childNodes[0]->attributes[1]->textContent);
// $news_title = $news_link[0]->textContent;
// $news_url = $news_link[0]->attributes[1]->textContent;
// var_dump($news_title);


?>