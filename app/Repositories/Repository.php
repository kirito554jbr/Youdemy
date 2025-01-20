<?php
// include_once '../DAOs/DAO.php';
class Repository
{

  private $instance;
  private $DAO;

  public function __construct()
  {
    $this->DAO = new DAO();
  }

  public function create($tablename, $params)
  {
    $this->DAO->create($tablename, $params);
  }

  public function delete($tablename, $id)
  {
    $this->DAO->delete($tablename, $id);
  }

  public function update($tablename, $id, $params)
  {
    $this->DAO->update($tablename, $id, $params);
  }

  public function getAll($tablename)
  {
    $result = $this->DAO->getALL($tablename);
    // var_dump($result);
    return $result;
  }

  public function getById($tablename, $id)
  {
    $result = $this->DAO->getById($tablename, $id);
    // var_dump($result);
    return $result;
  }


  public function getbynameById($tablename, $RoleName)
  {

    try {
      $query = "SELECT * FROM " . $tablename . " WHERE role_name = '" . $RoleName . "' LIMIT 1;";

      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      // Fetch as class instead of array
      // $stmt->setFetchMode(PDO::FETCH_CLASS, substr($tablename, 0, -1));
      // $result = $stmt->fetch();
      $result = $stmt->fetchall(PDO::FETCH_CLASS, substr($tablename, 0, -1));
      // If no result found, return null
      if (!$result) {
        return null;
      }
      // var_dump($result);
      // Return the object directly without casting to (object)
      return $result;
    } catch (PDOException $e) {
      echo ("Error: " . $e->getMessage());
      return null;
    }
  }
  public function getbyname($tablename, $RoleName)
  {

    try {
      $query = "SELECT * FROM " . $tablename . " WHERE role_name = '" . $RoleName . "' LIMIT 1;";

      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      // Fetch as class instead of array
      $stmt->setFetchMode(PDO::FETCH_CLASS, substr($tablename, 0, -1));
      $result = $stmt->fetch();
      // $result = $stmt->fetchall(PDO::FETCH_CLASS, substr($tablename, 0, -1));
      // If no result found, return null
      if (!$result) {
        return null;
      }
      // var_dump($result);
      // Return the object directly without casting to (object)
      return $result;
    } catch (PDOException $e) {
      echo ("Error: " . $e->getMessage());
      return null;
    }
  }

  public function getbynameCategorieAndTagByid($tablename, $RoleName)
  {


    try {
      $query = "SELECT * FROM " . $tablename . " WHERE name = '" . $RoleName . "' LIMIT 1;";
      // die($query);
      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      // Fetch as class instead of array
      $result = $stmt->fetchall(PDO::FETCH_CLASS, substr($tablename, 0, -1));

      // $stmt->setFetchMode(PDO::FETCH_CLASS, substr($tablename, 0, -1));
      // $result = $stmt->fetch();

      // If no result found, return null
      if (!$result) {
        return null;
      }
      // var_dump($result);
      // Return the object directly without casting to (object)
      // die($result);
      return $result;
    } catch (PDOException $e) {
      echo ("Error: " . $e->getMessage());
      return null;
    }
  }



  public function getbynameCategorieAndTag($tablename, $RoleName)
  {


    try {
      $query = "SELECT * FROM " . $tablename . " WHERE name = '" . $RoleName . "' LIMIT 1;";
      // die($query);
      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      // Fetch as class instead of array
      // $result = $stmt->fetchall(PDO::FETCH_CLASS, substr($tablename, 0, -1));

      $stmt->setFetchMode(PDO::FETCH_CLASS, substr($tablename, 0, -1));
      $result = $stmt->fetch();

      // If no result found, return null
      if (!$result) {
        return null;
      }
      // var_dump($result);
      // Return the object directly without casting to (object)
      // die($result);
      return $result;
    } catch (PDOException $e) {
      echo ("Error: " . $e->getMessage());
      return null;
    }
  }


  public function getUser($tablename, $UserName)
  {


    try {
      $query = "SELECT id FROM " . $tablename . " WHERE first_name = '" . $UserName . "' LIMIT 1;";
      // die($query);
      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      // Fetch as class instead of array
      $stmt->setFetchMode(PDO::FETCH_CLASS, $tablename);
      $result = $stmt->fetch();
      // $result = $stmt ->fetchObject(Utilisateur::class);


      // If no result found, return null
      if (!$result) {
        return null;
      }
      // var_dump($result);
      // Return the object directly without casting to (object)
      // die($result);

      return $result;
    } catch (PDOException $e) {
      echo ("Error: " . $e->getMessage());
      return null;
    }
  }

  public function getCour($tablename, $CourName)
  {


    try {
      $query = "SELECT id FROM " . $tablename . " WHERE titre = '" . $CourName . "' LIMIT 1;";
      // die($query);
      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      // Fetch as class instead of array
      $stmt->setFetchMode(PDO::FETCH_CLASS, $tablename);
      $result = $stmt->fetch();
      // $result = $stmt ->fetchObject(Utilisateur::class);


      // If no result found, return null
      if (!$result) {
        return null;
      }
      // var_dump($result);
      // Return the object directly without casting to (object)
      // die($result);

      return $result;
    } catch (PDOException $e) {
      echo ("Error: " . $e->getMessage());
      return null;
    }
  }


  public function findByEmailAndPassword($email, $password)
  {
    try {
      $query = "SELECT id, first_name, last_name , email, phone, photo, role_id , password FROM Utilisateur WHERE email = '" . $email . "' AND password = '" . $password . "';";
      // die($query);

      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();
      
      $result = $stmt->fetchObject(Utilisateur::class);
      

      // var_dump($result);
      // die();
      return $result;
    } catch (PDOException $e) {
      echo 'Error:' . $e;
    }
  }
}
