<?php
return [
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'catalog/page-([0-9]+)' => 'catalog/home/$1',
    'catalog' => 'catalog/home',
    'product/([0-9]+)' => 'product/view/$1',
    'page-([0-9]+)' => 'site/home/$1',
    '' => 'site/home',
]
?>
