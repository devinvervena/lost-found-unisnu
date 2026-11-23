<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['user_id', 'nama_barang', 'deskripsi', 'lokasi', 'foto', 'status', 'kontak'];
}
