<?php
class Product
{
    // DB stuff
    private $conn;
    private $table = 'product';

    // Post Properties
    public $id;
    public $title;
    public $image;
    public $description;
    public $price;
    public $category;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Product
    public function read()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . '';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Product
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . '  WHERE product.id = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->title = $row['title'];
        $this->image = $row['image'];
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->category = $row['category'];
    }

    // Create Product
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title, image = :image, description = :description, price = :price, category = :category';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category = htmlspecialchars(strip_tags($this->category));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':category', $this->category);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
    }

    // Update Product
    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                              SET title = :title, image = :image, description = :description, price = :price, category = :category
                              WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Product
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
