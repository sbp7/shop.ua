<?php

class Category
{
     public static function getCategoriesList ()
     {
         $db = Db::getConnection();

         $categoryList = [];

         $result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');

         $i=0;
         while ($row = $result->fetch()) {
             $categoryList[$i]['id'] = $row['id'];
             $categoryList[$i]['name'] = $row['name'];
             $i++;
         }

         return $categoryList;
     }

    public static function getCategoryNameById ($id)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT name FROM category WHERE id = '. $id);
        $row = $result->fetch();

        return $row['name'];
    }
}
?>