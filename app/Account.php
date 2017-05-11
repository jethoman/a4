<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function orders() {

       return $this->belongsTo('App\Order');
   }

    public static function getAccountsForDropdown() {
        $accounts = Account::orderBy('account_desc', 'ASC')->get();
    
        $accountsForDropdown = [];
        foreach($accounts as $account) {
            $accountsForDropdown[$account->id] = $account->account_desc;
        }
        return $accountsForDropdown;
    }
}
