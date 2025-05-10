<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class  AbsctractRepository{

    private  $model;


    public function __construct(Model $model )
    {
        $this->model = $model;
    }


    public function selectFilter($filters)
    {

        $this->model = $this->model->selectRaw($filters);

    }
    public function selectCoditions($coditions){
        $expressions = explode(';', $coditions);

        foreach($expressions as $expression){
            $exp = explode(':', $expression);

            $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
        }

    }

    public function getResult()
    {
        return $this->model;
    }
}
