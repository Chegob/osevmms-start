<?php

namespace App;
use App\Customer;
use App\Branch;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Filable Example
    //protected $fillable = ['name', 'branch', 'active'];

    //Guarded Example
    protected $guarded = [];
    protected $attributes = [
        'active'=> 1
    ];
    
    public function getActiveAttribute($attribute)
    {
      return $this->activeOptions()[$attribute]; 
        
    }
    
    public function scopeActive($query)
    {
       return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    
    public function activeOptions()
    {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-progress',
        ];
    }
}
