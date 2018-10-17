<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 10/15/18
 * Time: 8:23 PM
 */

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

abstract class FilterAbstract
{
    abstract public function filter(Builder $builder, $value);

    public function mappings() {
        return [];
    }

    protected function resolveFilterValues($key) {
        return array_get($this->mappings(), $key);
    }
}