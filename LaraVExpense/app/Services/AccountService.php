<?php

namespace App\Services;

use App\Dtos\Account\AccountCreateDTO;
use App\Dtos\Account\AccountDTO;
use App\Models\Account;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Pest\Support\Str;

class AccountService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(AccountDTO $accountDTO) {
        $account = Account::query()->create([
            'userID' => Auth::id(),
            'slug' => Str::slugify($accountDTO->name . (string) rand(10,100)),
            'name' => $accountDTO->name,
            'accountNo' => $accountDTO->accountNo,
            'openingBalance' => $accountDTO->openingBalance,
            'description' => $accountDTO->description,
        ]);

        return $account;
    }

    public function getById(int $accountID) {
        try {
            $account = Account::query()->with(['user'])->findOrFail($accountID);

            return $account;
        } catch (ModelNotFoundException $e) {
            throw new Exception('Model Not Found', 404);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getAll() {
        $accounts = Account::query()->with(['user'])->where('userID', Auth::id())->get();

        return $accounts;
    }

    public function update(Account $account, AccountDTO $accountDTO) {
        $data = array_filter($accountDTO->toArray(), fn ($value) => $value !== null);

        $account->update($data);

        return $account;
    }

    public function delete(Account $account) {
        $account = $this->getById($account->id);

        return $account->delete();
    }
}
