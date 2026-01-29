<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class AbstractFilter 
{
    protected Builder $builder;
    protected Request $request;

    protected $allowedFilters = [];
    protected $allowedSearches = [];


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder|Relation $builder): Builder
    {
        $this->builder = $builder instanceof Relation
        ? $builder->getQuery()
        : $builder;

        $this->applyFilters();
        $this->applySearch();

        return $this->builder;
    }

    public function applyFilters(): void
    {
        foreach ($this->allowedFilters as $field) {
            if ($this->request->filled($field)) {
                $this->builder->where($field,  $this->request->input($field));
            }
        }
    }

    public function applySearch(): void
    {
        if (!$this->request->filled('search') || empty($this->allowedSearches)) {
            return;
        }

        $search = $this->request->input('search');

        $this->builder->where(function ($query) use ($search) {
            foreach ($this->allowedSearches as $field) {
                $query->orWhere($field, 'like', "%{$search}%");
            }
        });
    }

}
