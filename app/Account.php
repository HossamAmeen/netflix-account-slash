<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModelTraits\EncryptableTrait;

class Account extends Model
{
    use EncryptableTrait;
    /**
	 * Encryptable Rules
	 *
	 * @var array
	 */

    protected $encryptable = ['password'];

    protected $fillable = [
        'email', 'password', 'code_link', 'used', 'category','replace_date', 'disabled', 'expiration_date'
    ];

    public function replaceNetflix()
    {
        return $this->hasOne('App\ReplacementAccount', 'account_id', 'id');
    }

}
