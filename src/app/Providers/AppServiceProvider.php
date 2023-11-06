<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Builder::macro('search', function (mixed $attributes): Builder {
            /** @var Builder<Model> $this */
            foreach ($attributes as $key => $value) {
                if ($value === null) {
                    continue;
                }
                $rule = Str::after($key, '|');
                $column = Str::before($key, '|');

                // 各検索条件に応じた処理を実行する
                // MEMO: whereBetweensだけ実装してるが、実際には他の検索条件もそのまま使えない可能性があるのでマクロとして実装する
                match (true) {
                    $rule === 'in' => $this->whereIn($column, $value),
                    $rule === 'like' => $this->where($column, 'LIKE', "%{$value}%"),
                    $rule === 'between' => $this->whereBetweens($column, $value['min'], $value['max']),
                    default => $this->where($column, $value),
                };
            }

            return $this;
        });

        Builder::macro('whereBetweens', function (string $column, mixed $min, mixed $max): Builder {
            if ($min === null || $max === null) {
                return $this;
            }

            /** @var Builder<Model> $this */
            $this->whereBetween($column, [$min, $max]);

            return $this;
        });

    }
}
