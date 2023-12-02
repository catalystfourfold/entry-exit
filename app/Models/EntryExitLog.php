<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EntryExitLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'visitor_name', 'in_building'];
    protected $table = 'entry_exit_logs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}