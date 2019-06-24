<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryGroup extends Model
{
    protected $table = "beneficiary_groups";

    public function members()
    {
        return $this->hasMany(BeneficiaryGroupMember::class, 'beneficiary_group_id', 'id');
    }
}
