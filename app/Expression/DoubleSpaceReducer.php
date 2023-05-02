<?php

namespace App\Expression;

use App\Context\Context;

class DoubleSpaceReducer extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/\s{2,}/', ' ', $context->getText());
    }
}