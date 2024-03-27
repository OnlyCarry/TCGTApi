<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users_system';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'nickname', 
        'email', 
        'name', 
        'verified_email', 
        'given_name', 
        'family_name', 
        'picture', 
        'isPro'];

    // Add your custom methods and functions here
}