<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 10/15/18
 * Time: 8:33 PM
 */

namespace App\Filters\Course;


use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class DifficultyFilter extends FilterAbstract
{
    public function mappings()
    {
        return [
          'begginer' => 'begginer',
          'intermediate' => 'intermediate',
          'advanced' => 'advanced'
        ];
    }

    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValues($value);
        if ($value === null) {
            return $builder;
        }
        return $builder->where('difficulty', $value);
    }
}