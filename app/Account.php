<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function orders() {

       return $this->belongsTo('App\Order');
   }

    public static function getAccountsForDropdown() {
        #get all accounts sorted
        $accounts = Account::orderBy('account_desc', 'ASC')->get();
        #create empty array for accounts
        $accountsForDropdown = [];
        foreach($accounts as $account) {
            $accountsForDropdown[$account->id] = $account->account_desc;
        }
        return $accountsForDropdown;
    }
}
