<?php

require 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser();
$pdf = $parser->parseFile('C:/Users/kh/Desktop/Laravel_Practical_Assessment_Task.pdf');
file_put_contents('assessment.txt', $pdf->getText());
