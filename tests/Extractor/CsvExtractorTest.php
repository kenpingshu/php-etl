<?php

use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\vfsStream;

class CsvExtractorTest extends TestCase
{
    public function testExtract()
    {
        $structure = [
            'csv' => [
                'input.csv' => "headline1,headline2,headline3\nsecond1,second2,second3\nthird1,third2,third3"
            ]
        ];

        $except = [
            [
                'second1', 'second2', 'second3'
            ],
            [
                'third1', 'third2', 'third3'
            ]
        ];

        $mock_csv = vfsStream::setup('root',null,$structure);
        $csv_extractor = new \Etl\Extractor\CsvExtractor($mock_csv->url() . '/csv/input.csv');
        foreach ($csv_extractor->extract() as $k => $row) {
            $this->assertEquals($except[$k], $row);
        }

    }
}
