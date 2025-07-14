<?php

declare(strict_types = 1);

namespace App\Http\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

trait WithPage
{
    public function paginate(array $items, int $total, int $page, int $perPage = 20): LengthAwarePaginator
    {
        $paginator = new LengthAwarePaginator(
            items: collect($items)->forPage($page, $perPage)->values(),
            total: $total,
            perPage: $perPage,
            currentPage: $page,
            options: [
                'path' => Paginator::resolveCurrentPath(),
            ]);

        return $paginator->appends(request()->except('page'));
    }
}
