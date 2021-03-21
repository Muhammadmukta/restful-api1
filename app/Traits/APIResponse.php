<?php

namespace App\Traits;

trait APIResponse {
    public function filterAndSort($model){

        if (request()->has('q')) {
            $q = request()->get('q'); // รับค่า q
            $model = $model->where('title', 'like', '%' . $q . '%'); // select * from posts where title like '%ข้อความค้นหา%';

        } elseif (request()->has('sort_by')) {

            $sortBy = request()->get('sort_by'); // รับค่า sortBy
            $model = $model->orderBy($sortBy);

        }
        return $model;
    }
}