<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use isaackosmos\CoursesSearch\CoursesSearch;
use Symfony\Component\DomCrawler\Crawler;

$httpClient = new Client([
    'base_uri' => 'http://www.alura.com.br/',
    'verify' => false,
]);
$crawler = new Crawler();

$coursesSearch = new CoursesSearch($httpClient, $crawler);
$courses = $coursesSearch->search('cursos-online-programacao/php');

foreach ($courses as $course) {
    showMessage($curso);
}
