<?php

namespace App\Expression;

use App\Context\Context;

class TabReplacer extends Expression
{
    public function interpret(Context $context): string
    {
        return str_replace("\t", '', $context->getText());
    }
}