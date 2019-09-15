<?php

declare(strict_types=1);

namespace App\DataProvider;

interface FavoriteRepositoryInterface
{
    public function switch(int $bookId, int $userId, string $createdAt) : int;
}
