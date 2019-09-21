<?php

namespace App\Http\Actions;

use App\Http\Requests\AddPointRequest;
use App\UseCases\AddPointUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class AddPointAction
{
    /** @var AddPointUseCase */
    private $useCase;

    /**
     * @param AddPointUseCase $useCase
     */
    public function __construct(AddPointUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(AddPointRequest $request): JsonResponse
    {
        // (1) JSONからパラメータを取得
        $customerId = filter_var($request->json('customer_id'), FILTER_VALIDATE_INT);
        $addPoint = filter_var($request->json('add_point'), FILTER_VALIDATE_INT);

        // (2)ポイント加算ユースケース実行

        $customerPoint = $this->useCase->run(
            $customerId,
            $addPoint,
            "ADD_POINT",
            Carbon::now()
        );

        // (3)レスポンス生成
        return response()->json(['customer_point' => $customerPoint]);
    }
}
