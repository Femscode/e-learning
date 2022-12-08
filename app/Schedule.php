<?php
namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
