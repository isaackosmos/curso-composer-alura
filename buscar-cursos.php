<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use isaackosmos\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'base_uri' => 'http://www.alura.com.br/',
    'verify' => false,
]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
