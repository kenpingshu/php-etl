<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 6/13/17
 * Time: 4:47 PM
 */

namespace Etl\Extractor;


class CsvExtractor implements ExtractorInterface
{
    private $source;

    private $delimiter = ',';

    private $enclosure = '"';

    private $skip = true;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function extract()
    {
        if (($handle = fopen($this->source, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, null, $this->delimiter, $this->enclosure)) !== FALSE) {
                if ($this->skip) {
                    $this->skip = false;
                    continue;
                }
                yield $data;
            }
            fclose($handle);
        }
    }
}