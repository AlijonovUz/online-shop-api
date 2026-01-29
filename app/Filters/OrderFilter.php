<?php

namespace App\Filters;

use App\Filters\AbstractFilter;

class OrderFilter extends AbstractFilter
{
    protected $allowedFilters = ['status'];
}