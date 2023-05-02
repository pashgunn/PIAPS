<?php

namespace App\Expression;

use App\Context\Context;

class BracketSpaceRemover extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/(\() | (\) )| ( ,)| ( \.)/', '$1$2$3$4', $context->getText());
    }
}