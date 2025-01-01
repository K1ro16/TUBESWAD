<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityUser extends Model
{
    use HasFactory;

    // Define the table associated with the model if it's not following Laravel's naming convention
    protected $table = 'community_user';

    // Define the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Define any fillable fields for mass assignment
    protected $fillable = ['community_id', 'user_id'];

    // Define relationships if needed
    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
