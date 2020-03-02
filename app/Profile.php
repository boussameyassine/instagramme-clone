<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded=[];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : '/profile/8VJtG88m0obhOzEtATWjQTKbtmjkD1qm47XdFaJ2.jpeg';

        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

