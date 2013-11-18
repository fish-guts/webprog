<?php


class CantonService implements Service {

    private $data;

    public function __construct()
    {
        $this->data = new Canton();
    }
    public function findById($id)
    {
        $data = $this->data->kantone;
        if ( ! empty($id) )
        {
            $result = null;

            foreach($data as $key => $value)
            {
                if ($value['Kuerzel'] == $id)
                {
                    return $value;
                }
            }
            return $result;
        }
    }
   
    public function findAll($sort = null)
    {
        if(empty($sort))
        {
            return $this->data->kantone;
        }

        return $this -> sortByKey($sort);
    }
    

    // stole this from stackoverflow
    public function sortByKey($key)
    {
        $result = $this->data->kantone;
        $sorter=array();
        $ret=array();
        reset($result);
        foreach ($result as $ii => $value) {
            if(isset($value[$key]))
            {
                $sorter[$ii]=$value[$key];
            }
        }
        asort($sorter);
        foreach ($sorter as $ii => $value) {
            $ret[$ii]=$result[$ii];
        }
        $result=$ret;
        return $result;
    }
}