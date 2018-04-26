<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:44
 */

namespace products;

class products {
    public $id;
    public $name;
    public $price;
    public $gross;
    public $image;
    public $color;

    public function __construct($id,$name,$price,$gross,$image,$color) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->gross = $gross;
        $this->image = $image;
        $this->color = $color;
    }

    public static function all() {
        $list = [];
        $db = \Db::getInstance();
        $req = $db->query('SELECT * FROM products');

        foreach($req->fetchAll() as $products) {
            $list[] = new products($products['id'], $products['name'], $products['price'],
                $products['gross'], $products['image'], $products['color']);
        }

        return $list;
    }

    public static function find($color,$name) {
        $list = [];
        $db = \Db::getInstance();
        $color_var = '';
        foreach ($color as $c)   $color_var.=",'".$c."'";
        if($color_var!='')  $color_var = ' and color in('.substr($color_var,1,strlen($color_var)-1).')';

        //$req = $db->prepare('SELECT * FROM products WHERE name like :name_var  :color_var');
        //$req = $db->prepare('SELECT * FROM products WHERE   :color_var');

        // the query was prepared, now we replace :color_var with our actual $color_var value and :name with our actual $name value
        //$req->execute(array('color_var' => $color_var,'name_var' => "'%".$name."%'" ));
        //$req->execute(array('color_var' => $color_var ));

        //$products = $req->fetch();
        //print_r($products);




        $req = $db->query("SELECT * FROM products WHERE name like '%".$name."%' ".$color_var);

        foreach($req->fetchAll() as $products) {
            $list[] = new products($products['id'], $products['name'], $products['price'],
                $products['gross'], $products['image'], $products['color']);
        }

         return $list;

    }
}
