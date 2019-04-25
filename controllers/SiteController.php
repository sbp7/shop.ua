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

     public function actionContact ()
     {
         $userEmail = '';
         $userText = '';
         $result = false;

         if (isset($_POST['submit'])){
             $userEmail = $_POST['userEmail'];
             $userText = $_POST['userText'];
             $errors = false;

             if (!User::checkEmail($userEmail)) {
                 $errors[] = 'Неправильный email.';
             }

             if ($errors == false) {
                 $adminMail = "";
                 $subject = 'Тема письма';
                 $message = "От {$userEmail}. Текст: {$userText}";
                 $result = mail($adminMail, $subject, $message);
                 $result = true;
             }
         }

         require_once (ROOT. '/views/site/contact.php');
         return true;
     }
}

?>
