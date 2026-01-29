<?php

namespace App\Filters;

use App\Filters\AbstractFilter;

class ProductFilter extends AbstractFilter
{
    protected $allowedFilters = ['category_id'];
    protected $allowedSearches = ['name'];
}