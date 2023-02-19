<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\UserVoucherRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserVoucherResource;
use Illuminate\Http\Request;

class UserVoucherApiController extends Controller
{

    protected $repository;
    public function __construct(UserVoucherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * api saves vouchers for the user when the user receives a new voucher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $voucher_id = $request->voucher_id;
        $user_id = $request->user_id;

        $voucher = $this->repository->checkVoucherExit($voucher_id);
        if ($voucher == null) {
            return response()->json(
                [
                    'message' => "not have voucher id",
                ]
            );
        }

        $row = $this->repository->checkUserHasVoucher($user_id, $voucher_id);
        if ($row) {
            return response()->json(
                [
                    'message' => "user had this voucher",
                ]
            );
        }
        // get user vouchers list
        $user_voucher = $this->repository->store($request);

        if ($user_voucher) {
            return response()->json($this->repository->index());
        } else {
            return response()->json(
                [
                    'message' => "Voucher này đã hết",
                ]
            );
        }
    }

    /**
     * api returns all vouchers that each user has.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection 
     */
    public function userHasVoucher()
    {
        $user_vouchers = $this->repository->indexCoinCards();
        return UserVoucherResource::collection($this->repository->indexCoinCards());
    }

    /**
     * api returns all vouchers the user has.
     *
     * @param int $id
     * @return \App\Http\Resources\UserVoucherResource
     */
    public function userHasVoucherWithId($id)
    {
        return new UserVoucherResource($this->repository->showCoinCard($id));
    }
}