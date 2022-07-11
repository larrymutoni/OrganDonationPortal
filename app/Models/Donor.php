<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'donors';
    protected $primarykey = 'DonorId';
    protected $fillable = [
        'firstname', 'lastname', 'email', 'gender', 'dob', 'bloodtype',
        'infectiousDiseases', 'donationtype', 'height', 'organtype', 'address1', 'address2',
        'state', 'phonenumber', 'postalcode', 'city', 'country', 'status'
    ];
}
