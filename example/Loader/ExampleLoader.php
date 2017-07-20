<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 7/20/17
 * Time: 4:00 PM
 */

namespace Example\Loader;


use Etl\Loader\LoaderInterface;

class ExampleLoader implements LoaderInterface
{

    public function load($data)
    {
        print $data['one'] . ' ' . $data['two'] . ' ' . $data['three'] . ' load complete' . PHP_EOL;
    }
}