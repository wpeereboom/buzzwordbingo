Buzzword Bingo
==============
### The VNU Vacature Media coding competition!

Welcome to our little coding competition. We are a team of PHP developers working on the job-seeker sites of VNU Vacature Media. We're always on the look-out for smart colleagues that want to join us in Amsterdam Noord.

We also know that, as with code, there's an art to writing a good job ad. And, as with code, there's a lot of them out there that could do with some improvement! So we came up with this little exercise: score job ads from our sites with Buzzword Bingo!

The more of the buzzwords from our list are in there, the higher (lower?) the ad scores. And when we feed your code a list of urls of job ads on our main site (NationaleVacaturebank.nl), we want you to order the ads based on the total buzzword score. Since not all buzzwords are created equally, they do have a different weight given in the input file, so be sure to take that into account.

Oh, and there's prizes! (see below).

## The Assignment

Write a PHP program that takes as input:
* A list of URLs for job postings on NationaleVacaturebank.nl
* A list of 'Buzzwords', along with their weighting factor

The program will then retrieve the job posting texts, and score each posting based on the occurrence of buzzwords in the text. The program then outputs the URLs along with their score in order of highest scoring job posting first.

## The Fine Print

So how will we determine the winner? Of course, all you brilliant people will give us a correct, working program, so that is not sufficient.

First, we will test both with the supplied tests, as well as with a more extensive test-set that we are keeping all to ourselves.

Second, we will take into account your test coverage, as reported by PHPUnit.

Third, we will use static analysis tools (PHP Mess Detector for now) to give us figures for cyclomatic complexity (on function and class level) and standard rules violations.

## Getting your entrance to us

Clone this repo, ans send us a pull request when you're happy with your code! It's that easy. Any questions, mail `j.van.oostveen@vnuvacaturemedia.com`.

To initialise the project, run `php composer.phar install`.

Make sure the final program can be run with a `php buzzwordbingo.php <buzzword-list-file> <url-list-file>`, and that they print a sorted (on score, highest first) list of `<url>`, `<score>` lines to stdout.

## Deadlines, anyone?

Yes. We want to wrap this up this month, so your final entry should be in **before** 1 July. Our final verdict on the winners will be presented two weeks later, on 
14 July.

## Gimme the Prize

Prizes for this contest are as follows:

1. A Sony Smart Watch 2
2. e-book: [Modernizing Legacy PHP Applications](https://leanpub.com/mlaphp)
3. Same as 2

## Tools

Some quickstart on how to use the tools. There are many more options (including integrating them with your IDE), but these are the basics.

Running PHP Mess Detector:
``./vendor/bin/phpmd src text cleancode,codesize,design,naming,unusedcode``

Running PHPUnit:
``./vendor/bin/phpunit tests``

Creating code coverage with PHPUnit:
``./vendor/bin/phpunit --coverage-text``
