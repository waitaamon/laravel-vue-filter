<?php

namespace App;

use App\Filters\Course\CourseFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    public $appends = [
        'started',
        'formattedAccess',
        'formattedDifficulty',
        'formattedType',
        'formattedStarted'
    ];
    protected $hidden  = [
        'users'
    ];
    public function getFormattedAccessAttribute() {
        return $this->free === true ? 'Free' : 'Premium';
    }

    public function getFormattedDifficultyAttribute() {
        return ucfirst($this->difficulty);
    }
    public function getFormattedTypeAttribute() {
        return ucfirst($this->type);
    }

    public function getFormattedStartedAttribute() {
        return $this->started === true ?  'Started' : 'Not Started';
    }

    public function scopeFilter(Builder $builder, $request, array $filters = []) {
        return (new CourseFilters($request))->add($filters)->filter($builder);
    }

    public function subjects() {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    public function getStartedAttribute () {
        if(!auth()->check()) {
            return false;
        }
        return $this->users->contains(auth()->user());
    }
    public function users () {
        return $this->belongsToMany(User::class);
    }
}
