<?php

namespace App\Services\Transaction;

use App\Dtos\Transaction\TransactionDTO;
use App\Models\Transaction;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll() {
        $transactions = Transaction::query()
                        ->with(['account:id,name,accountNo', 'user:id,name,email', 'category:id,name', 'subCategory:id,name'])
                        ->where('userID', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->paginate();

        return $transactions;
    }

    public function create(TransactionDTO $transactionDTO) {
        $transaction = Transaction::query()->create($transactionDTO->toArray());

        return $transaction;
    }

    public function getById(int $transID) {
        try {
            $transaction = Transaction::query()
                        ->where('userID', Auth::id())
                        ->with(['account:id,name,accountNo', 'user:id,name,email', 'category:id,name', 'subCategory:id,name'])
                        ->findOrFail($transID);

            return $transaction;
        } catch (ModelNotFoundException $e) {
            throw new Exception('Transaction Not Found', 404);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
