<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Announcement extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'title',
        'description', 
        'type',
        'image',
        'link',
        'button_text',
        'background_color',
        'is_active',
        'order',
        'start_date', 
        'end_date', 
    ];


    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'datetime', 
        'end_date' => 'datetime', 
    ];


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeCurrentlyActive(Builder $query): Builder
    {
        $now = Carbon::now();

        return $query->active()
            ->where(function ($q) use ($now) {
                $q->whereNull('start_date') 
                  ->orWhere('start_date', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('end_date') 
                  ->orWhere('end_date', '>=', $now);
            });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order', 'asc') 
                     ->orderBy('created_at', 'desc');
    }

    public function getIsCurrentlyActiveAttribute(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $now = Carbon::now();

        if ($this->start_date && $now->lt($this->start_date)) { 
            return false;
        }

        if ($this->end_date && $now->gt($this->end_date)) { 
            return false;
        }

        return true;
    }
}