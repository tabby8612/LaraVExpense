<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AccountCreateRequest;
use App\Http\Requests\Account\AccountUpdateRequest;
use App\Http\Resources\Account\AccountCreateResource;
use App\Http\Resources\Account\AccountDetailResource;
use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    public function __construct(private AccountService $accountService)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $accounts = $this->accountService->getAll();

        return AccountDetailResource::collection($accounts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // return Inertia::render('Transaction');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountCreateRequest $request) {
        $accountDto = $request->toDTO();

        $accountService = $this->accountService->create($accountDto);

        return new AccountCreateResource($accountService);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account) {

        $accountDetail = $this->accountService->getById($account->id);

        return new AccountDetailResource($accountDetail);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountUpdateRequest $request, Account $account) {

        Gate::authorize("update", $account);

        $requestDto = $request->toDTO();

        $accountDetail = $this->accountService->getById($account->id);

        $newAccountDetails = $this->accountService->update($accountDetail, $requestDto);

        return response()->json([
            'message' => 'Accoun Updated Successfully',
            'data' => new AccountDetailResource($newAccountDetails),
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account) {
        
        Gate::authorize('delete', $account);

        $isDeleted = $this->accountService->delete($account);

        return response()->json([
            'message' => 'Deleted Successfully',
            'success' => true,
        ]);
    }
}
