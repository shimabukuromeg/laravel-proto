<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FavoriteService;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class FavoriteActionController extends Controller
{
    private $favorite;

    public function __construct(FavoriteService $favorite)
    {
        $this->favorite = $favorite;
    }

    public function switchFavorite(Request $request)
    {
        $this->favorite->switchFavorite(
            (int)$request->get('book_id'),
            (int)$request->get('user_id'),
            Carbon::now()->toDateString()
        );

        return response()->json('ok', Response::HTTP_OK);
    }
}
