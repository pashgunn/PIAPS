<?php

namespace App\Expression;

use App\Context\Context;

abstract class Expression
{
    public Context $content;
    public function interpret(Context $context): string
    {
        return $context->getText();
    }
}