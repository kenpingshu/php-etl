<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 6/13/17
 * Time: 4:14 PM
 */

namespace Etl\Transformation;


interface TransformationInterface
{

    public function transform($data);
}