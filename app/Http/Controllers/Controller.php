<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * generate a LengthAwarePaginator paginaton with a collection passed
     *
     * @param Collection $collection
     * @param integer $perPage
     * @param int $page
     * @param array $options
     * @return LengthAwarePaginator collection paginated
     */
    public function paginate($collection, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $collection = $collection instanceof Collection ? $collection : Collection::make($collection);
        return new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, $options);
    }
}
