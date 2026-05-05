<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\TransactionCreateRequest;
use App\Http\Requests\Transaction\TransactionUpdateRequest;
use App\Http\Resources\Transaction\TransactionCreateResource;
use App\Http\Resources\Transaction\TransactionDetailResource;
use App\Models\Transaction;
use App\Services\Transaction\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class TransactionController extends Controller {

    public function __construct(private TransactionService $transactionService) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $transactions = $this->transactionService->getAll();

        return TransactionDetailResource::collection($transactions);
    }

    public function store(TransactionCreateRequest $request) {
        
        $transactionDTO = $request->toDTO();

        $transaction = $this->transactionService->create($transactionDTO);

        return new TransactionCreateResource($transaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction) {
        $transactionDetail = $this->transactionService->getById($transaction->id);

        return new TransactionDetailResource($transactionDetail);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction) {
        Gate::authorize("update", $transaction);

        $requestDto = $request->toDTO();

        // $accountDetail = $this->accountService->getById($account->id);

        // $newAccountDetails = $this->accountService->update($accountDetail, $requestDto);

        // return response()->json([
        //     'message' => 'Accoun Updated Successfully',
        //     'data' => new AccountDetailResource($newAccountDetails),
        //     'success' => true,
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
