<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 6/16/17
 * Time: 2:32 PM
 */

namespace Etl\Exceptions;

use Exception;

class TransformationException extends  Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}