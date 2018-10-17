<?php 

namespace App\Filters\Course;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class StartedFilter extends FilterAbstract
{
    public function mappings()
    {
        return [
            'true' => true,
            'false' => false
        ];
    }

    public function filter(Builder $builder, $value) {
        $value = $this->resolveFilterValues($value);
        if( $value === null || !auth()->check()) {
            return $builder;
        }
        $method = $value  ? 'whereHas' : 'whereDoesntHave';
        return $builder->{$method}('users', function (Builder $builder) {
            $builder->whereIn('users.id', [auth()->id()]);
        });
    }
}