<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\VoucherRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class VoucherApiController extends Controller
{
    protected $repository;
    public function __construct(VoucherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * api returns a list of all available vouchers.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection 
     */
    public function index()
    {
        $vouchers = $this->repository->index();
        return VoucherResource::collection($vouchers);
    }

    /**
     * api stores updates on a voucher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // voucher need update
        $voucher = $this->repository->show($id);

        // The number of updated vouchers needs to be greater than 
        // the number of vouchers currently used.

        $messages = [
            'quantium.gt' => 'Số lượng voucher cập nhật cần lớn hơn số lượng voucher hiện đã được sử dụng.',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'minimun_price' => 'required|numeric|min:0',
            'quantium' => 'required|numeric|gt:'.($voucher->total - $voucher->quantium).'|min:0',
            'effective_date' => 'required',
            'expiration_date' => 'required|after_or_equal:effective_date',
        ], $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }

        $this->repository->update($id, $request);

        return response()->json(
            [
                'message' => "Voucher update successful.",
            ]
        );
    }

    /**
     * api remove the mitiple specified voucher from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $this->repository->destroy($request->ids);
        return response()->json(
            [
                'message' => "Successfully deleted voucher.",
            ]
        );
    }
}