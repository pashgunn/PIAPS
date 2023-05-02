<?php

namespace App\Expression;

use App\Context\Context;

class DashReducer extends Expression
{
    public function interpret(Context $context): string
    {
        return str_replace('-', '—', $context->getText());
    }
}