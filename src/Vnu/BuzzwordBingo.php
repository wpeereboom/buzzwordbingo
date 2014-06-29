<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\FileParser\FileParserInterface;
use Vnu\JobPosting\RetrieverInterface;
use Vnu\Score\Calculator;
use Vnu\Score\ResultListInterface;

/**
 * Class BuzzwordBingo
 * @package Vnu
 */
class BuzzwordBingo
{

    /**
     * @var FileParser\FileParserInterface
     */
    private $buzzWordFileParser;

    /**
     * @var FileParser\FileParserInterface
     */
    private $urlFileParser;

    /**
     * @var RetrieverInterface
     */
    private $jobPostingRetriever;

    /**
     * @var ResultListInterface
     */
    private $scoreList;

    public function __construct(
        FileParserInterface $buzzWordFileParser,
        FileParserInterface $urlFileParser,
        RetrieverInterface $jobPostingRetriever,
        ResultListInterface $scoreList)
    {
        $this->buzzWordFileParser = $buzzWordFileParser;
        $this->urlFileParser = $urlFileParser;
        $this->jobPostingRetriever = $jobPostingRetriever;
        $this->scoreList = $scoreList;
    }

    /**
     * Run the application.
     *
     * @return string
     */
    public function run()
    {
        foreach ($this->urlFileParser->getStructuredContent() as $url) {
            $content = $this->jobPostingRetriever->getContent($url->getUrl());
            $this->scoreList->addCandidate($url->getUrl(), $this->calculateScore($content));
        }

        return $this->scoreList->getFinalResult();
    }

    /**
     * @param $content
     *
     * @return int
     */
    protected function calculateScore($content)
    {
        $totalScore = 0;

        foreach ($this->buzzWordFileParser->getStructuredContent() as $buzzWord) {
            $scoreCalculator = new Calculator($content, $buzzWord->getWord(), $buzzWord->getScore());
            $totalScore = $totalScore + $scoreCalculator->getCalculatedScore();
        }

        return $totalScore;
    }
}
