<?php

namespace App;

use App\Mail\ProjectCreate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'owner_id'
    ];

    // This is now handled with a custom listener, but leaving it here as an example //
//    public static function boot(){
//        parent::boot();
//
//        static::created(function ($project){
//            Mail::to('example@test.com')->send(
//                new ProjectCreate($project)
//            );
//        });
//    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
