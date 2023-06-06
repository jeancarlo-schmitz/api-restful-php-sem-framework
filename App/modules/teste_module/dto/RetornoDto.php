<?php

namespace teste_module\dto;

class RetornoDto
{

    private $param1;
    private $param2;

    public function toArray() {
        return [
            'param1' => $this->param1,
            'param2' => $this->param2,
        ];
    }

    public function getParam1()
    {
        return $this->param1;
    }

    public function setParam1($param1)
    {
        $this->param1 = $param1;
    }

    public function getParam2()
    {
        return $this->param2;
    }

    public function setParam2($param2)
    {
        $this->param2 = $param2;
    }


}