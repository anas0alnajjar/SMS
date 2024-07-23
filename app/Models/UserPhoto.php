<?php
// App\Models\UserPhoto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    use HasFactory;
    protected $table = 'users_photos'; // تعيين الجدول الصحيح
    protected $fillable = ['user_id', 'photo_path'];
}
