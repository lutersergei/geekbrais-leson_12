<?php
/**
 * Created by PhpStorm.
 * User: drKox
 * Date: 26.06.2016
 * Time: 16:28
 */
class Realty
{
    protected $id;
    public $area;
    public $rooms;
    public $floor;
    public $adress;
    public $price;
    public $description;

    public function get_realty_information ($id)
    {
        global $link;
        if ($this->id == NULL) return;
        $query="SELECT * FROM `realty` WHERE `realty_id` = '$id'";
        $data_result = mysqli_query($link,$query);
        if ($row = mysqli_fetch_assoc($data_result))
        {
            $this->area=$row['area'];
            $this->rooms=$row['rooms'];
            $this->floor=$row['floor'];
            $this->adress=$row['adress'];
            $this->price=$row['price'];
            $this->description=$row['description'];
        }

    }

    //    Конструктор класса
    function __construct($id = NULL)
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
        if ($id == NULL) return;
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

    public function get_id()
    {
        return $this->id;
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