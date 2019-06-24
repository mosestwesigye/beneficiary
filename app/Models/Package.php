<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    protected $table = "packages";

    public function packages()
    {
        return $this->hasMany(Package::class,'package_id','id');
    }



    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function beneficiary()
        {
            return $this->hasOne(Beneficiary::class, 'id', 'beneficiary_id');
        }

}
