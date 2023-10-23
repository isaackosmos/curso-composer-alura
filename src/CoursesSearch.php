<?php

namespace isaackosmos\CoursesSearch;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class CoursesSearch
{
    public function __construct(
        protected ClientInterface $httpClient,
        protected Crawler $crawler,
    ) {
    }

    public function search(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);
        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);

        $coursesElements = $this->crawler->filter('span.card-curso__nome');
        $coursesNames = [];

        foreach ($coursesElements as $element) {
            $coursesNames[] = $element->textContent;
        }

        return $coursesNames;
    }
}
