<?php
/**
 * Created by PhpStorm.
 * User: drKox
 * Date: 26.06.2016
 * Time: 16:28
 */
class Realty
{
    public $id;
    public $area;
    public $rooms;
    public $floor;
    public $adress;
    public $price;
    public $description;

    public function get_realty_information ($id)
    {
        global $link;
        $query="SELECT * FROM `realty` WHERE `realty_id` = '$id'";
        $data_result = mysqli_query($link,$query);
        $realty_info=array();
        if ($row = mysqli_fetch_assoc($data_result))
        {
            $realty_info[]=$row;
        }
        foreach ($realty_info as $realty_one)
        {
            $this->area=$realty_one['area'];
            $this->rooms=$realty_one['rooms'];
            $this->floor=$realty_one['floor'];
            $this->adress=$realty_one['adress'];
            $this->price=$realty_one['price'];
            $this->description=$realty_one['description'];
        }
    }

    //    Конструктор класса
    function __construct($id = NULL, $area = NULL, $rooms = NULL, $floor = NULL, $adress = NULL, $price = NULL, $description = NULL)
    {
        $this->id=$id;
        if ($this->id !== NULL)
        {
            $this->get_realty_information($this->id);
        }
    }
    
    public static function update_realty($id, $area, $rooms, $floor, $adress, $price, $description)
    {
        global $link;
        $query=<<<SQL
         UPDATE `realty` 
         SET 
         `area` = '$area', 
         `rooms` = '$rooms', 
         `floor` = '$floor', 
         `adress` = '$adress', 
         `price` = '$price', 
         `description` = '$description'
         WHERE `realty`.`realty_id` = $id
SQL;
        $data_result = mysqli_query($link,$query);
        if ($data_result) return true;
        else return false;
    }
    
    public static function get_all_realty()
    {
        global $link;
        $query="SELECT * FROM `realty` ORDER BY `realty`.`realty_id` ASC ";
        $data_result = mysqli_query($link,$query);
        $apartment_array=array();
        while($row = mysqli_fetch_assoc($data_result))
        {
            $apartment_array[]=$row;
        }
        $Object_array=array();
        foreach ($apartment_array as $item) {
            $object = new Realty();
            $object->id = $item['realty_id'];
            $object->area = $item['area'];
            $object->rooms = $item['rooms'];
            $object->floor = $item['floor'];
            $object->adress = $item['adress'];
            $object->price = $item['price'];
            $Object_array[]=$object;
        }
        return $Object_array;
    }
}