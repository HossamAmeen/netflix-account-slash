<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModelTraits\EncryptableTrait;

class ReplacementAccount extends Model
{
    use EncryptableTrait;
    /**
	 * Encryptable Rules
	 *
	 * @var array
	 */
    

    protected $encryptable = ['password'];

    protected $fillable = [
        'account_id', 'email', 'password', 'used', 'category', 'was_valid'
    ];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

}