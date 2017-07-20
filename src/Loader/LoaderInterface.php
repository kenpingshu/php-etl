<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 6/13/17
 * Time: 4:14 PM
 */

namespace Etl\Loader;


interface LoaderInterface
{

    public function load($data);
}