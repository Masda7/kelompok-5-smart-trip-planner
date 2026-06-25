<?php

namespace App\Services;

use App\Contracts\DestinationServiceInterface;
use App\Models\Destination;

class DestinationService implements DestinationServiceInterface
{
    public function getAll(?string $search, ?int $categoryId, int $perPage, int $page)
    {
        $query = Destination::with('category');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        return $query->paginate($perPage, ['*'], 'page', $page);
    }

    public function getById(int $id)
    {
        return Destination::with('category')->findOrFail($id);
    }
}
