<?php namespace App\Models;

use CodeIgniter\Model;

class TournamentsModel extends Model
{
    protected $table = 'tournaments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',
    'portada',
    'description',
    'code',
    'no_players',
    'isFree',
    'start_date',
    'game',
    'comunity',
    'name',
    'ended',];

    // Add your custom methods and functions here
}