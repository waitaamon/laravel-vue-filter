<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 10/15/18
 * Time: 8:40 PM
 */

namespace App\Filters\Course;


use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class TypeFilter extends FilterAbstract
{
    public function mappings()
    {
        return [
            'theory' => 'theory',
            'snippet' => 'snippet',
            'project' => 'project'
        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValues($value);

        if ($value === null) {
            return $builder;
        }
       return $builder->where('type', $value);
    }
}