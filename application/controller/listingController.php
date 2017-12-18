<?php

class ListingController extends Controller
{
    public function index($products = '')
    {
        if ($products == '') 
        {
            $products = Product::all();
        }
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/listing/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function search()
    {
        $products= '';

        if (isset($_GET['search']))
        {
            $keyword = filter_input(INPUT_GET, 'search-term', FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        if ($category == 'All')
        {
            $products = $this->searchAll($keyword);
        }
        else
        {
            $products = $this->searchByCategory($category, $keyword);
        }
         
        $this->index($products);
    }
    
    public function sortLowToHigh($category, $keyword)
    {
    }
    
    public function sortHighToLow($category, $keyword)
    {
    }
    
    public function searchAll($keyword) 
    {
        if (empty($keyword)) 
        {
            return Product::all();
        }
        
        return Product::withKeywordInName($keyword);
    }
    
    public function searchByCategory($category, $keyword) 
    {
        if (empty($keyword))
        {
            return Product::getAllProductsByCategories($category);
        }
        
        return Product::getProductsByCategory($category, $keyword);
    }
}
