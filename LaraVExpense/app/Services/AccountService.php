<?php

namespace App\Services;

use App\Dtos\Account\AccountCreateDTO;
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

    public function create(AccountCreateDTO $accountCreateDTO) {
        $account = Account::query()->create([
            'userID' => Auth::id(),
            'slug' => Str::slugify($accountCreateDTO->name . (string) rand(10,100)),
            'name' => $accountCreateDTO->name,
            'accountNo' => $accountCreateDTO->accountNo,
            'openingBalance' => $accountCreateDTO->openingBalance,
            'description' => $accountCreateDTO->description,
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

    public function update(Account $account, AccountCreateDTO $accountCreateDTO) {
        $data = array_filter($accountCreateDTO->toArray(), fn ($value) => $value !== null);

        $account->update($data);

        return $account;
    }

    public function delete(Account $account) {
        $account = $this->getById($account->id);

        return $account->delete();
    }
}
