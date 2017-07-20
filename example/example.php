<?php
require_once '../vendor/autoload.php';

$extractor = new \Etl\Extractor\CsvExtractor('data/example.csv'); //define your own extractor need implement \Etl\Extractor\ExtractorInterface
$transformation = new \Example\Transformation\ExampleTransformation(); //define your own transformation need implement \Etl\Transformation\TransformationInterface
$loader = new \Example\Loader\ExampleLoader(); // define your own loader need implement \Etl\Loader\LoaderInterface

(new \Etl\EtlTool($extractor, $transformation, $loader))->execute();