<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    static public function getRecord()
    {
        $return = self::select('class.*', 'users.name AS created_by_name')
            ->join('users', 'users.id', 'class.created_by');

        if (!empty(Request::get('search'))) {
            $search = Request::get('search');
            $return = $return->where('class.name', 'like', '%' . $search . '%');
        }

        if (!is_null(Request::get('status')) && Request::get('status') !== '') {
            $status = Request::get('status');
            $return = $return->where('class.status', '=', $status);
        }

        $return = $return->where('class.is_deleted', '=', false)
            ->orderBy('class.id', 'desc')
            ->paginate(10);

        return $return;
    }


}
