<?php

require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\config.php'; // Include the definition of the config class
require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Entities\blog.php'; // Include the definition of the blog class

class BlogController {
    private $pdo;

    public function __construct() {
        $this->pdo = config::getConnexion(); // Get the database connection from the config class
    }

    // R de CRUD (read)
    public function listBlogPosts() {
        $sql = "SELECT * FROM blog";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // D de CRUD (delete)
    // public function deleteBlogPost($id) {
    //     $sql = "DELETE FROM blog WHERE id_blog = :id";
    //     try {
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->bindValue(':id', $id);
    //         return $stmt->execute();
    //     } catch (PDOException $e) {
    //         die('Error: ' . $e->getMessage());
    //     }
    // }
    public function deleteBlogPost($id_blog) {
        $sql = "DELETE FROM blog WHERE id_blog = :id_blog";
        var_dump($sql); // Add this line to inspect the SQL query
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id_blog', $id_blog);
            return $stmt->execute();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    
    
    public function listAcceptedBlogPosts($page = 1, $perPage = 10) {
        // SQL query to fetch accepted blog posts with pagination
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM blog WHERE accepted = 1 LIMIT :offset, :perPage";
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
            $stmt->execute();
    
            // Fetch blog posts as objects
            $blogs = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $blog = new Blog(
                    $row['id_blog'],
                    $row['title'],
                    $row['created_at'],
                    $row['author'],
                    $row['image_url'],
                    $row['content']
                );
                $blogs[] = $blog;
            }
            return $blogs;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // C de CRUD (create)
    public function addBlogPost($title, $created_at, $author, $image_url, $content) {
        $sql = "INSERT INTO blog (title, created_at, author, image_url, content) VALUES (:title, :created_at, :author, :image_url, :content)";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'created_at' => $created_at,
                'author' => $author,
                'image_url' => $image_url,
                'content' => $content
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function addBlogPostb($title, $created_at, $author, $image_url, $content,$id_user) {
        $sql = "INSERT INTO blog (title, created_at, author, image_url, content, id_user) VALUES (:title, :created_at, :author, :image_url, :content ,:id_user)";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'created_at' => $created_at,
                'author' => $author,
                'image_url' => $image_url,
                'content' => $content,
                'id_user'=> $id_user
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function addBlogPost2($title, $created_at, $author, $image_url, $content) {
        $sql = "INSERT INTO blog (title, created_at, author, image_url, content, accepted) VALUES (:title, :created_at, :author, :image_url, :content, :accepted)";
        try {
            $stmt = $this->pdo->prepare($sql);
            // Set the default value for the accepted field
            $accepted = false;
            $stmt->execute([
                'title' => $title,
                'created_at' => $created_at,
                'author' => $author,
                'image_url' => $image_url,
                'content' => $content,
                'accepted' => $accepted  // Bind the value of accepted
            ]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function updateAcceptance($article_id, $accepted) {
        $sql = "UPDATE blog SET accepted = :accepted WHERE id_blog = :article_id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'accepted' => $accepted,
                'article_id' => $article_id
            ]);
            // Return true if the update was successful
            return true;
        } catch (PDOException $e) {
            // Handle any errors
            die('Error: ' . $e->getMessage());
        }
    }

    // U de CRUD (update)
    public function updateBlogPost($id_blog, $title, $created_at, $author, $image_url, $content) {
        $sql = "UPDATE blog SET title = :title, created_at = :created_at, author = :author, image_url = :image_url, content = :content WHERE id_blog = :id_blog";
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'id_blog' => $id_blog,
                'title' => $title,
                'created_at' => $created_at,
                'author' => $author,
                'image_url' => $image_url,
                'content' => $content
            ]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    

    public function getBlogPost($id) {
        $sql = "SELECT * FROM blog WHERE id_blog = :id";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(); // Fetch single row
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getBlogPostU($id_userC) {
        $sql = "SELECT * FROM blog WHERE id_userC = :id_userC";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id_userC', $id_userC);
            $stmt->execute();
            return $stmt->fetch(); // Fetch single row
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listBlogPostss($page, $perPage) {
        // Calculate offset
        $offset = ($page - 1) * $perPage;

        // SQL query with pagination
        $sql = "SELECT * FROM blog LIMIT :offset, :perPage";

        try {
            $query = $this->pdo->prepare($sql);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            $query->execute();

            $blogPosts = [];
            while ($row = $query->fetch()) {
                // Create a BlogPost object with all fields
                $blogPost = new blog(
                    $row['id_blog'],
                    $row['title'],
                    $row['content'],
                    $row['author'],
                    $row['image_url'],
                    $row['created_at']
                    // Pass the missing argument here
                );
                //$blogPost->setId($row['id_blog']); // Set the ID
                // Add the BlogPost object to the array
                $blogPosts[] = $blogPost;
            }
            return $blogPosts;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function countBlogPosts() {
        $sql = "SELECT COUNT(*) AS count FROM blog";
        try {
            $query = $this->pdo->query($sql);
            $result = $query->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function searchBlogPostsByDate($page, $perPage, $date) {
        // Calculate offset
        $offset = ($page - 1) * $perPage;

        // SQL query with pagination and date filter
        $sql = "SELECT * FROM blog WHERE DATE(created_at) = :date LIMIT :offset, :perPage";

        try {
            $query = $this->pdo->prepare($sql);
            $query->bindValue(':date', $date);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->bindValue(':perPage', $perPage, PDO::PARAM_INT);
            $query->execute();

            $blogPosts = [];
            while ($row = $query->fetch()) {
                // Create a BlogPost object with all fields
                $blogPost = new Blog(
                    $row['title'],
                    $row['content'],
                    $row['author'],
                    $row['image_url'],
                    $row['created_at']
                    
                );
                $blogPost->setId($row['id_blog']); // Set the ID
                // Add the BlogPost object to the array
                $blogPosts[] = $blogPost;
            }
            return $blogPosts;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function countBlogPostsByDate($date) {
        $sql = "SELECT COUNT(*) AS count FROM blog WHERE DATE(created_at) = :date";
        try {
            $query = $this->pdo->prepare($sql);
            $query->execute(['date' => $date]);
            $result = $query->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listBlogPostsss() {
        // Calculate offset
        

        // SQL query with pagination
        $sql = "SELECT * FROM blog ";

        try {
            $query = $this->pdo->prepare($sql);
            
            $query->execute();

            $blogPosts = [];
            while ($row = $query->fetch()) {
                // Create a BlogPost object with all fields
                $blogPost = new blog(
                    $row['id_blog'],
                    $row['title'],
                    $row['content'],
                    $row['author'],
                    $row['image_url'],
                    $row['created_at']
                    // Pass the missing argument here
                );
                //$blogPost->setId($row['id_blog']); // Set the ID
                // Add the BlogPost object to the array
                $blogPosts[] = $blogPost;
            }
            return $blogPosts;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function searchBlogPosts($searchQuery) {
        // SQL query to search for blog posts by title
        $sql = "SELECT * FROM blog WHERE title LIKE CONCAT('%', :searchQuery, '%')";
    
        try {
            // Prepare the SQL statement
            $query = $this->pdo->prepare($sql);
    
            // Bind the search query parameter
            $query->bindValue(':searchQuery', $searchQuery, PDO::PARAM_STR);
    
            // Execute the query
            $query->execute();
    
            // Fetch all matching blog posts
            $blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);
    
            // Return the results
            return $blogPosts;
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, display a message)
            echo 'Error: ' . $e->getMessage();
            // Optionally, you can throw the exception again to handle it at a higher level
            throw $e;
        }
    }

}

?>
