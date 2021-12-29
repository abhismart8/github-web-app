<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGithubData extends Model
{
    use HasFactory;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_github_data';

    protected $hidden = [
        //
    ];

    /**
     *
     * fillable properties
     */
    protected $fillable = [
        'id',
        'user_id',
        'personal_access_token'
    ];

    protected $casts = [
        //
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
