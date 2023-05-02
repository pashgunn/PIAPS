<?php

namespace App\Expression;

use App\Context\Context;

class QuoteReplacer extends Expression
{
    public function interpret(Context $context): string
    {
        return preg_replace('/"([^"]*)"/', "«$1»", $context->getText());
    }
}