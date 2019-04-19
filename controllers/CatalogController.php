<?php

class CatalogController
{
     public static function actionHome ($page = 1)
     {
         $categories = [];
         $categories = Category::getCategoriesList();

         $latestProducts = [];
         $latestProducts = Product::getLatestProducts(Product::NUMBER_OF_RECENT, $page);

         $pagination = new Pagination(Product::NUMBER_OF_RECENT, $page, Product::SHOW_BY_DEFAULT, 'page-');

         require_once (ROOT.'/views/catalog/home.php');

         return true;
     }

    public function actionCategory ($categoryId, $page = 1)
    {
        $categories = [];
        $categories = Category::getCategoriesList();

        $categoryName = Category::getCategoryNameById($categoryId);

        $categoryProducts = [];
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/catalog/category.php');

        return true;
    }
}
?>
