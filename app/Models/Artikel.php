<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_artikel', 'image', 'kategori_id', 'isi'];
    public $timestamp = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function deleteImage(){
        if ($this->image && file_exists(public_path('images/artikel' . $this->image))) {
            return unlink(public_path('images/artikel' . $this->image));
            
            }
        
        }
}
