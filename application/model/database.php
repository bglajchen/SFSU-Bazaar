<?php

/**
 * Singleton class Database
 */

class Database
{
    private $db = null;
    private static $instance = null;

    private function __construct()
    {
	$this->db = $this->openDatabaseConnection();
    }

    private function __clone() {}

    public static function getInstance()
    {
	if (!isset(self::$instance))
	{
	    try
	    {
		self::$instance = new Database();
	    }
	    catch (PDOException $e)
	    {
		exit('Database connection could not be established.');
	    }
	}

	return self::$instance;
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
	// set the (optional) options of the PDO connection. in this case, we set the fetch mode to
	// "objects", which means all results will be objects, like this: $result->user_name !
	// For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
	// @see http://www.php.net/manual/en/pdostatement.fetch.php
	$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

	// generate a database connection, using the PDO connector
	// @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
	return new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }


    /************************ User queries ************************************/

    public function addUser($user)
    {
	$sql =  "INSERT INTO user " .
		"(firstName, lastName, password, email)" .
		"VALUES " .
		"(:firstName, :lastName, :password, :email)";
	$query = $this->db->prepare($sql);
	$param = array(	':firstName' 	=> $user->firstName,
			':lastName' 	=> $user->lastName,
			':password'	=> $user->password,
			':email' 	=> $user->email);

	$query->execute($param);
    }

    public function getUserByID($userID)
    {
	$sql =  "SELECT * FROM user WHERE " .
	    "userID = :userID LIMIT 1";
	$query = $this->db->prepare($sql);
	$params = array(':userID'	=> $userID);
	$query->execute($params);

	return $query->fetch();
    }

    public function getUserInfoByEmail($email)
    {
    $sql =  "SELECT * FROM user WHERE " .
	"email = :email LIMIT 1";
    $query = $this->db->prepare($sql);
    $params = array(':email'   => $email);
    $query->execute($params);

    return $query->fetch();
    }

    public function updateUser(	$firstName, $lastName, $password,
				   $email, $imagePath, $userID	)
    {
	//TODO: This is a temporary model of how this could work.
	//      Needs a permanent solution.

	$sql = 	"UPDATE user SET " .
	    "firstName = :firstName, lastName = :lastName," .
	    "password = :password, email = :email," .
	    "imagePath = :imagePath" .
	    "WHERE userID = :userID";
	$query = $this->db->prepare($sql);
	$params = array(	':firstName'	=> $firstName,
	    ':lastName'	=> $lastName,
	    ':password'	=> $password,
	    ':email'	=> $email,
	    ':imagePath'	=> $imagePath,
	    ':userID'	=> $userID	);

	$query->execute($params);
    }

    public function deleteUserByID($userID)
    {
	$sql =  "DELETE FROM user WHERE userID = :userID";
	$query = $this->db->prepare($sql);
	$params = array(':userID' => $userID);

	$query->execute($params);
    }

   /**
    * ACTION: doesEmailExist
    * Checks if login info entered by the user exist in database
    * @param string $email, email entered
    */
    public function doesEmailExist($email)
    {
	$sql = "SELECT email FROM user WHERE email = '$email'";
	$query = $this->db->prepare($sql);
	$query->execute();

	return $query->fetch();
    }

    /************************ Meetup queries **********************************/
    /**
    Gets all data of the meetup table from he database
    @return Array of meetup objects
     */

    public function addMeetup($meetup)
    {
	$sql =  "INSERT INTO meetup " .
	    "(status, sellerID, " .
	    "dateOfMeetup, timeOfMeetup, locationOfMeetup)" .
	    "VALUES " .
	    "(:status, :sellerID, " .
	    ":dateOfMeetup, :timeOfMeetup, :locationOfMeetup)";
	$query = $this->db->prepare($sql);
	$param = array(	':status' 	   => $meetup->status,
	    ':sellerID'	   => $meetup->sellerID,
	    ':dateOfMeetup'	   => $meetup->dateOfMeetup,
	    ':timeOfMeetup'	   => $meetup->timeOfMeetup,
	    ':locationOfMeetup' => $meetup->locationOfMeetup	);
	$query->execute($param);
    }

    public function getMeetupByID($meetID)
    {
	$sql = "SELECT * FROM meetup WHERE meetID = :meetID LIMIT 1";
	$query = $this->db->prepare($sql);
	$param = array(':meetID' => $meetID);
	$query->execute($param);

	return $query->fetch();
    }

    public function deleteMeetupByID($meetID)
    {
	$sql = "DELETE * FROM meetup WHERE meetID = :meetID";
	$query = $this->db->prepare($sql);
	$param = array(':meetID' => $meetID);
	$query->execute($param);
    }

    /************************ Product queries *********************************/


    /**
     * Gets all data of the product table from the database
     * @return Array of product objects
     */
    public function getAllProducts()
    {
        $sql = "SELECT * FROM product";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all products from the database with a similiar keyword in name
     *
     */
    public function getProductsByName($keyword)
    {
        $sql = "SELECT * FROM product WHERE name LIKE '%$keyword%'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Returns products ordered by the highest price
     * @param $keyword is the search term
     * @return array of products
     */
    public function getProductsByNamePriceHighToLow($keyword)
    {
        $sql = "SELECT * FROM product WHERE name LIKE '%$keyword%' ORDER BY price DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Returns products ordered by lowest price
     * @param $keyword is the search term
     * @return array of products
     */
    public function getProductsByNamePriceLowToHigh($keyword)
    {
        $sql = "SELECT * FROM product WHERE name LIKE '%$keyword%' ORDER BY price";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all products in a category
     * @param $cat is the name of the category to be searched
     * @return array of products
     */
    public function getProductsByCategory($cat)
    {
        $sql = "SELECT *
                FROM product  
                WHERE category LIKE '$cat'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all products in a category, arranged from highest price to lowest price
     * @param $cat is the name of the category to be searched
     * @return array of products
     */
    public function getProductsByCategoryPriceHighToLow($cat)
    {
        $sql = "SELECT *
                FROM product p  
                WHERE category LIKE '$cat'
                ORDER BY price DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get all products in a category, arranged from lowest price to highest price
     * @param $cat is the name of the category to be searched
     * @return array of products
     */
    public function getProductsByCategoryPriceLowToHigh($cat)
    {
        $sql = "SELECT *
                FROM product   
                WHERE category LIKE '$cat'
                ORDER BY price";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * With the given category name and keyword(search term), returns a list of products in
     * the given category and and a name similar the keyword
     * @param $cat is the category name
     * @param $keyword is the search term
     * @return a list of products
     */
    public function getProductsWithCategory($cat, $keyword)
    {
        $sql = "SELECT * 
                FROM product 
                WHERE name LIKE '%$keyword%' AND category LIKE '$cat'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();

    }

    /**
     * Gets products with a keyword and the name of a category, and
     * orders the results by the highest price to the lowest price
     * @param $cat is the category name
     * @param $keyword is the search term
     * @return array of products
     */
    public function getProductsWithCategoryPriceHighToLow($cat, $keyword)
    {
        $sql = "SELECT * 
                FROM product p  
                WHERE p.name LIKE '%$keyword%' AND p.category LIKE '$cat'
                ORDER BY price DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();

    }

    /**
     * Gets products within a category that match the keyword, and orders
     * the results by the lowest price to the highest price
     * @param $cat is the category name
     * @param $keyword is the search term
     * @return array of products
     */
    public function getProductsWithCategoryPriceLowToHigh($cat, $keyword)
    {
        $sql = "SELECT * 
                FROM product p  
                WHERE p.name LIKE '%$keyword%' AND p.category LIKE '$cat'
                ORDER BY price";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Get the product with the giving id
     * @param int $id
     * @return the product
     */
    public function getProductByID($productID)
    {
        $sql = "SELECT * FROM product WHERE productID = :productID LIMIT 1";
        $query = $this->db->prepare($sql);
        $param = array(':productID' => $productID);
        $query->execute($param);

        return $query->fetch();
    }

    /**
     * @return a random product object
     */
    public function getRandomProduct()
    {
        $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    /**
     * @return a list of random products
     */
    public function getProductsAtRandom()
    {
        $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 10;";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Delete the product with the giving id
     * @param int $id
     */
    public function deleteProductByID($productID)
    {
        $sql = "DELETE FROM product WHERE productID = :productID";
        $query = $this->db->prepare($sql);
        $param = array(':productID' => $productID);
        $query->execute($param);
    }


    /**
     * Add a product to the db
     * @param Product with all data about the product
     */
    public function addProduct($product)
    {
        $sql = "INSERT INTO product " .
            "(name, sellerID, price, quantity, quality, imagePath, "
            . "videoUrl, description, tags, category, isService)" .
            "VALUES ".
            "(:name, :sellerID, :price, :quantity, :quality, :imagePath, "
            . ":videoUrl, :description, :tags, :category, :isService)";

        $query = $this->db->prepare($sql);
        $param = array( ':name' => $product->name,
            ':sellerID' => $product->sellerID,
            ':price' => $product->price,
            ':quantity' => $product->quantity,
            ':quality' => $product->quality,
            ':imagePath' => $product->imagePath,
            ':videoUrl' => $product->videoUrl,
            ':description' => $product->description,
            ':tags' => $product->tags,
            ':category' => $product->category,
            ':isService' => $product->isService);

        $query->execute($param);
    }

    /**
     * Gets products ordered by the most recently added to the oldest.
     * @return array of products
     */
    public function getProductsByMostRecent()
    {
        $sql = "SELECT * FROM product ORDER BY createdAt DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /************************ Category queries ************************************/


    /*
     * Get a list of all categories
     * @return an array of categories
     */
    public function getAllCategories(){
        $sql = "SELECT * FROM category";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    /************************ Reveiw queries ************************************/

    public function addReview($reviewerID, $userID, $raiting, $comment)
    {
        $sql =  "INSERT INTO review " .
            "(reviewerID, userID, raiting, comment)" .
            "VALUES " .
            "(:reviewerID, :userID, :raiting, :comment)";
        $query = $this->db->prepare($sql);
        $param = array( ':reviewerID'   => $reviewerID,
            ':userID'       => $userID,
            ':raiting'      => $raiting,
            ':comment'      => $comment);

        $query->execute($param);
    }

    public function getReviewByID($reviewID)
    {
        $sql =  "SELECT " .
            "reviewID" .
            "FROM review WHERE " .
            "reviewID = :reviewID LIMIT 1";
        $query = $this->db->prepare($sql);
        $params = array(':reviewID'     => $reviewID);

        $query->execute($params);
    }

}

