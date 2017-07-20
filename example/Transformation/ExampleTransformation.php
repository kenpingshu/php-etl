<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 7/20/17
 * Time: 3:59 PM
 */

namespace Example\Transformation;


use Etl\Transformation\TransformationInterface;

class ExampleTransformation implements TransformationInterface
{

    public function transform($data)
    {
        return [
            'one' => $data[0],
            'two' => $data[1],
            'three' => $data[2]
        ];
    }
}