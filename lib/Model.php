<?php

namespace lib;

class Model {

    protected static $table;

    public static function all() {
        $table = static::$table;
        return DB::query("select * from $table");
    }

    public static function find($id) {
        $table = static::$table;
        $res = DB::query("select * from $table where id=$id");
        if (!empty($res))
            return $res[0];
        else
            return $res;
    }

    public static function where($field, $value) {
        $table = static::$table;
        $query = "select * from ".$table." where ".$field."=".$value;
        $res = DB::query($query);
        return $res;
    }

}