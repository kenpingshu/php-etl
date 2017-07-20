<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 6/13/17
 * Time: 4:12 PM
 */

namespace Etl;


use Etl\Exceptions\TransformationException;
use Etl\Extractor\ExtractorInterface;
use Etl\Loader\LoaderInterface;
use Etl\Transformation\TransformationInterface;

class EtlTool
{
    private $extractor;
    private $transformation;
    private $loader;
    private $total = 0;
    private $success = 0;
    private $skip = 0;
    private $executeTime = 0;

    public function __construct(
        ExtractorInterface $extractor,
        TransformationInterface $transformation,
        LoaderInterface $loader
    )
    {
        $this->extractor = $extractor;
        $this->transformation = $transformation;
        $this->loader = $loader;
        $this->executeTime = microtime(true);
    }

    public function execute()
    {
        foreach ($this->extractor->extract() as $k => $row) {
            try {
                $transform_data = $this->transformation->transform($row);
                $this->loader->load($transform_data);
                $this->success++;
            } catch (TransformationException $e) {
                print $e->getMessage() . PHP_EOL;
                $this->skip++;
            }
            print '.';
            $this->total = $k + 1;
        }
        $this->finish();
    }

    /**
     * @param ExtractorInterface $extractor
     */
    public function setExtractor(ExtractorInterface $extractor)
    {
        $this->extractor = $extractor;
        return $this;
    }

    /**
     * @param TransformationInterface $transformation
     */
    public function setTransformation(TransformationInterface $transformation)
    {
        $this->transformation = $transformation;
        return $this;
    }

    /**
     * @param LoaderInterface $loader
     */
    public function setLoader(LoaderInterface $loader)
    {
        $this->loader = $loader;
        return $this;
    }

    private function finish()
    {
        print 'Done' . PHP_EOL;
        print 'Total: ' . $this->total . PHP_EOL;
        print 'Success: ' . $this->success . PHP_EOL;
        print 'Skip: ' . $this->skip . PHP_EOL;
        print 'Execute Time:' . (microtime(true) - $this->executeTime) . PHP_EOL;
    }
}