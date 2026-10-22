<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coaches';

    protected $guarded = [];

    protected $casts = [
        'certifications' => 'array',
        'client_levels' => 'array',
        'topics' => 'array',
        'specializations' => 'array',
        'session_rate' => 'integer',
    ];

    public const STYLE_LABELS = [
        'fast-track' => 'Fast Track',
        'heart-first' => 'Heart-First',
        'game-plan' => 'Game Plan',
        'deep-dive' => 'Deep Dive',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name.' '.$this->last_name);
    }

    public function getPrimaryStyleLabelAttribute(): ?string
    {
        return self::STYLE_LABELS[$this->coaching_style] ?? null;
    }

    public function getSecondaryStyleLabelAttribute(): ?string
    {
        return self::STYLE_LABELS[$this->secondary_style] ?? null;
    }

    public function getClientPriceAttribute(): int
    {
        return (int) $this->session_rate + 100;
    }

    public function getBioParagraphsAttribute(): array
    {
        if (! $this->bio) {
            return [];
        }

        $normalized = str_replace(["\r\n", "\r"], "\n", $this->bio);
        $paragraphs = preg_split('/\n\s*\n+/', trim($normalized));

        return array_values(array_filter(array_map(function (string $paragraph) {
            $lines = array_map('trim', explode("\n", $paragraph));

            return trim(implode(' ', array_filter($lines, fn ($line) => $line !== '')));
        }, $paragraphs ?: []), fn ($p) => $p !== ''));
    }
}
