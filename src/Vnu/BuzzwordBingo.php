<?php
/**
 * Winfred Peereboom <wpeereboom@gmail.com>
 */

namespace Vnu;

use Vnu\FileParser\FileParserInterface;
use Vnu\FileParser\UrlFileParser;
use Vnu\FileReader\BuzzWordFileParser;

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
     * @var JobPostingParserInterface
     */
    private $jobPostingParser;

    /**
     * @var ScoreListInterface
     */
    private $scoreList;

    public function __construct(
        FileParserInterface $buzzWordFileParser,
        FileParserInterface $urlFileParser,
        JobPostingParserInterface $jobPostingParser,
        ScoreListInterface $scoreList)
    {
        $this->buzzWordFileParser = $buzzWordFileParser;
        $this->urlFileParser = $urlFileParser;
        $this->jobPostingParser = $jobPostingParser;
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
            /** @var Url $url */
            $content = $this->jobPostingParser->getContent($url->getUrl());
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
        $score = 0;

        foreach ($this->buzzWordFileParser->getStructuredContent() as $buzzWord) {
            /** @var BuzzWord $buzzWord */
            if ($this->wordOccursInContent($content, $buzzWord->getWord())) {
                $score = $score + $buzzWord->getScore();
            }
        }

        return $score;
    }

    /**
     * @param $content
     * @param $word
     *
     * @return int
     */
    protected function wordOccursInContent($content, $word)
    {
        return strpos($content, $word);
    }
}
