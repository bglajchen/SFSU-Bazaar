<?php

/* 
 * Class Product
 */

class ProductController extends Controller
{   
    /**
     * PAGE: index
     * Renders the product's index page
     */
    public function index($productID = '') 
    {   
        if (empty($productID))
        {
           header('location: ' . URL . 'error');
        }
        
        $product = Product::get($productID);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/product/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * PAGE: confirmation
     * Renders the confirmation page
     */
    public function confirmation($productID)
    { 
        if (empty($_SESSION))
        {
            header('location:' . URL . 'login/index');
        }
        
        $product = Product::get($productID);
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/product/confirmation.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * PAGE: newProduct
     * Renders the newProduct page
     */
    public function newProduct()
    {   
        if (empty($_SESSION))
        {
            header('location:' . URL . 'login/index');
        }
        
        $categories = Product::getAllCategories();
        
        require APP . 'view/_templates/header.php';
        require APP . 'view/product/newProduct.php';
        require APP . 'view/_templates/footer.php';
    }
    
    /**
     * ACTION: add
     * Saves the product infomation to the database
     */
    public function add()
    {
        // check if the form is set
        if (isset($_POST['addProduct']))
        {
            // get all data about the product
            $newProduct = $this->getNewProduct();
            
            // save product to database
            $newProduct->create();
        }
        
        // redirect to homeg page
        header('location: ' . URL . 'home');
    }
    
    
    /**
     * ACTION: delete
     * Delete the product infomation from the database
     */
    public function delete($productID)
    {
        Product::delete($productID);
        
        // redirect to home page
        header('location: ' . URL . 'home');
    }


    /**
     * ACTION HELPER: getData
     * Get all the product's data and make a product
     * @return Product
     */
    private function getNewProduct()
    {   
        $name = filter_input(INPUT_POST, 'name');
        //$sellerID = filter_input(INPUT_POST, 'sellerID');
        $sellerID = $_SESSION['userID'];
        $price = filter_input(INPUT_POST, 'price');
        $quantity = filter_input(INPUT_POST, 'quantity');
        $quality = filter_input(INPUT_POST, 'quality');
        $imagePath = $this->processUploadedImage('image');
        $videUrl = filter_input(INPUT_POST, 'videoUrl');
        $description = filter_input(INPUT_POST, 'description');
        $tags = filter_input(INPUT_POST, 'tags');
        $category = filter_input(INPUT_POST, 'category');
        
        if (!empty($videUrl))
        {
            $videUrl = str_replace('watch?v=', 'embed/', $videUrl);
        }
        
        $isService = filter_input(INPUT_POST, 'isService');
        if (empty($isService))
        {
            $isService = 0;
        }
        
        return new Product( $name, $sellerID, $price, $quantity, 
                            $quality, $imagePath, $videUrl, 
                            $description, $tags, $category, $isService);
    }
    
    /**
     * ACTION HEPLER: processUploadedImage
     * Get the uploaded image and move to the img directory
     * @param string $name name of (HTML)field
     * @return string Path of the image upto the public directory
     */
    private function processUploadedImage($name)
    {   
        $absolutePath = "";
        
        // realpath will return the public directory dynamically 
        // i.e. blablabla/SfsuBazaar/public/
        $imageDir = realpath('') . '/img/';
        
        $tmpPath = $_FILES["$name"]['tmp_name'];
        
        if (is_uploaded_file($tmpPath))
        { 
            $absolutePath = $imageDir . $_FILES["$name"]['name'];
            move_uploaded_file($tmpPath, $absolutePath);
        }
        
        return strstr($absolutePath,'public/img');
    }
}