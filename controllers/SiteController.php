<?php

class SiteController
{
     public static function actionHome ($page = 1)
     {
         $categories = [];
         $categories = Category::getCategoriesList();

         $latestProducts = [];
         $latestProducts = Product::getLatestProducts($count = Product::NUMBER_OF_RECENT, $page);

         $recommendedProducts = [];
         $recommendedProducts = Product::getRecommendedProducts();

         $pagination = new Pagination(Product::NUMBER_OF_RECENT, $page, Product::SHOW_BY_DEFAULT, 'page-');

         require_once (ROOT.'/views/site/home.php');

         return true;
     }
}
?>
