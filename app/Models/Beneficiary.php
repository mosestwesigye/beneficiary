<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiary extends Model
{
    use SoftDeletes;
    protected $table = "beneficiaries";

    public function beneficiary()
    {
        return $this->hasMany(Beneficiary::class,'beneficiary_id','id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class,'beneficiary_id','id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function districts()
    {

      return $this->hasMany(District::class, 'district_id', 'id');

    }

}
