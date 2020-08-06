<?php
namespace App; 

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Feed extends Eloquent{
    /**
 * The database table used by the model.
 *
 */
    protected $table = 'feeds';
    
    protected $fillable = [
        'post_title', 'post_description',
    ];
}
?>