<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeneficiaryGroupMember extends Model
{
    protected $table = "beneficiary_group_members";


    public function group()
    {
        return $this->hasOne(BeneficiaryGroup::class, 'id', 'beneficiary_group_id');
    }

    public function beneficiary()
    {
        return $this->hasOne(Beneficiary::class, 'id', 'beneficiary_id');
    }

    public function payments()
    {
        return $this->hasMany(LoanRepayment::class, 'beneficiary_id', 'id');
    }
}
