<?php

class Product
{   
    // properties that the DB will take care of
    private $productID = null;
    private $createAt = null;
    private $updatedAt = null;
    
    //required properties
    private $name = null;
    private $sellerID = null;
    private $price = null;
    private $quantity = null;
    
    // optional properties 
    private $quality = null;
    private $imagePath = null;
    private $videoUrl = null;
    private $description = null;
    private $tags = null;
    private $category = null;
    private $isService = null;
    
    // update this property when the product is brought
    private $meetID = null;
    
    /**
     * Constructor with required properties and optional properties
     * Note: put optional properties behind required properties to avoid 
     * unexpected behavior 
     */ 
    public function __construct($name, $sellerID, $price, $quantity,
            $quality = '', $imagePath = '', $videUrl = '', $description ='',
            $tags = '', $category = '', $isService = 0)
    {
        $this->name = $name;
        $this->sellerID = $sellerID;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->quality = $quality;
        $this->imagePath = $imagePath;
        $this->videoUrl = $videUrl;
        $this->description = $description;
        $this->tags = $tags;
        $this->category = $category;
        $this->isService = $isService;
    }
    
    
    /**
     * Magical getter to get the specified property
     * @param $property
     * @return $property 
     */
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
    
    /**
     * Magical setter to set the specified property
     * @param $property
     * @param $value
     * @return Product
     */
    public function __set($property, $value) {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }

      return $this;
    }
    
    
    
    /**
     * 
     */
    public function create()
    {
        Database::getInstance()->addProduct($this);
    }
    
    public static function get($productID)
    {
        return Database::getInstance()->getProductByID($productID);
    }
    
    public function update()
    {
        
    }
    
    public static function delete($productID)
    {
        Database::getInstance()->deleteProductByID($productID);
    }
    
    public static function all()
    {   
        return Database::getInstance()->getAllProducts();
    }
    
    public static function withKeywordInName($keyword)
    {
        return Database::getInstance()->getProductsByName($keyword);
    }

    public static function getFeaturedProducts()
    {
        return Database::getInstance()->getProductsAtRandom();
    }

    public static function getRecentProducts()
    {
        return Database::getInstance()->getProductsByMostRecent();
    }
    
    public static function getAllCategories()
    {
        return Database::getInstance()->getAllCategories();
    }
    
    public static function getAllProductsByCategories($category)
    {
        return Database::getInstance()->getProductsByCategory($category);
    }
    
    public static function getProductsByCategory($category, $keyword) 
    {
        return Database::getInstance()->getProductsWithCategory($category, $keyword);
    }
    

    

































    /**
     * Gets all existing products from the database
     * @return Array Contain all the exiting products in db
     */
    public function getAll() 
    {
        $sql = 'SELECT * FROM products';
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }
    
    /**
     * Get the product with the giving id
     * @param int $id
     */
    public function getById($id)
    {
        
    }

    /**
     * Get all products from db with the giving name
     * @param string $name
     * @return Array Contain products with the same name in db
     */
    public function getByName($name) 
    {
        $sql = "SELECT * FROM products WHERE name = '$name'";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }
    
    /**        
     * Get all products from database similiar to keywords searched
     *
     */
    public function getByKeywords($keyword)
    {
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Add a product to the db
     * @param Associative Array $product with all data about the product
     */
    public function add($product) 
    {
        $sql = "INSERT INTO products " .
               "(name, price, seller_id, picture, video, description)" .
               "VALUES ".
               "(:name, :price, :seller_id, :picture, :video, :description)";
               
        $query = $this->db->prepare($sql);
        $param = $this->arrayToPDOParam($product);
        
        $query->execute($param);
    }
    
    /**
     * Change a Associative Array to the PDO param format
     * i.e. change array['key']['value'] to array[':key']['value']
     * @param Associative Array $array
     * @return Associative Array in PDO param format
     */
    public function arrayToPDOParam($array)
    {
        $PDOParam = array();
        
        foreach ($array as $key => $value) 
        {
            $PDOParam[":$key"] = $value;
        }
        
        return $PDOParam;
    }
}

