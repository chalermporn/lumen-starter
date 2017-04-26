<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyModel extends Model
{
    function getTestData($id = '')
    {
        $where = $id ? ['id', '=', $id] : [];
        return DB::table('test_table')->where($where)->get();
    }

    function addTestData($data)
    {
        return DB::table('test_table')->insert($data);
    }

    function editData($id, $data)
    {
        return DB::table('test_table')->where('id', $id)->update($data);
    }

    function deleteData($id)
    {
        return DB::table('test_table')->where('id', $id)->delete();
    }
}