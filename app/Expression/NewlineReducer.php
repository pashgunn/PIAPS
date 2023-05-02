<?php

namespace App\Expression;

use App\Context\Context;

class NewlineReducer extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/\n{2,}/', "\n", $context->getText());
    }
}