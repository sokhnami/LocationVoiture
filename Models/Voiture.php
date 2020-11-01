<?php
class Voiture
{

   // database connection and table name
   private $db;
   private $table_name = "voiture";
   private $immatriculation;
   private $type;
   private $libelle;
   private $quantite;
   private $gerantId;
   private $dateCreation;

   // constructor with $db as database connection
   public function __construct($db)
   {
      $this->db = $db;
   }

   //  public function __construct($nomTrajet,$type,$libelle,$voiture, $gerantId){

   //     $this->nomTrajet= $nomTrajet;
   //     $this->type= $type;
   //     $this->libelle= $libelle;
   //     $this->voiture= $voiture;
   //     $this->gerantId= $gerantId;
   //  } 

   public function getImmatriculation()
   {
      return $this->immatriculation;
   }
   public function setImmatriculation($immatriculation)
   {
      $this->immatriculation = $immatriculation;
   }

   public function getType()
   {
      return $this->type;
   }
   public function setType($type)
   {
      $this->type = $type;
   }

   public function getLibelle()
   {
      return $this->libelle;
   }
   public function setLibelle($libelle)
   {
      $this->libelle = $libelle;
   }

   public function getQuantite()
   {
      return $this->quantite;
   }
   public function setQuantite($quantite)
   {
      $this->quantite = $quantite;
   }

   public function getGerant()
   {
      return $this->gerantId;
   }
   public function setGerant($gerantId)
   {
      $this->gerantId = $gerantId;
   }

   public function getDateCreation()
   {
      return $this->dateCreation;
   }
   public function setDateCreation($dateCreation)
   {
      $this->dateCreatioon = $dateCreation;
   }

   // read products
   function read()
   {

      // select all query
      $query = "SELECT *  FROM " . $this->table_name;

      // prepare query statement
      $stmt = $this->db->prepare($query);

      // execute query
      $stmt->execute();

      return $stmt;
   }

   // create product
   function create()
   {

      // query to insert record
      $query = "INSERT INTO
                  " . $this->table_name . "
            SET
            immatriculation=:immatriculation, type=:type, libelle=:libelle, quantite=:quantite, gerantId=:gerantId,dateCreation=:dateCreation";

      // prepare query
      $stmt = $this->db->prepare($query);

      // sanitize
      $this->immatriculation = htmlspecialchars(strip_tags($this->immatriculation));
      $this->type = htmlspecialchars(strip_tags($this->type));
      $this->libelle = htmlspecialchars(strip_tags($this->libelle));
      $this->quantite = htmlspecialchars(strip_tags($this->quantite));
      $this->gerantId = htmlspecialchars(strip_tags($this->gerantId));
      $this->dateCreation = htmlspecialchars(strip_tags($this->dateCreation));

      // bind values
      $stmt->bindParam(":immatriculation", $this->immatriculation);
      $stmt->bindParam(":type", $this->type);
      $stmt->bindParam(":libelle", $this->libelle);
      $stmt->bindParam(":quantite", $this->quantite);
      $stmt->bindParam(":gerantId", $this->gerantId);
      $stmt->bindParam(":dateCreation", $this->dateCreation);
      print('$this->immatriculation');
      print( $this->immatriculation);
      // execute query
      if ($stmt->execute()) {
         return true;
      }

      return false;
   }

   // used when filling up the update product form
   function readOne()
   {

      // query to read single record
      $query = "SELECT
                  *
           FROM
               " . $this->table_name . " where Immatriculation = ?";

      // prepare query statement
      $stmt = $this->db->prepare($query);

      // bind immatriculation of product to be updated
      $stmt->bindParam(1, $this->immatriculation);

      // execute query
      $stmt->execute();

      // get retrieved row
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set values to object properties
      
      $this->type = $row['Type'];
      $this->libelle = $row['Libelle'];
      $this->quantite = $row['Quantite'];
      $this->gerantId = $row['GerantId'];
      $this->nomTrajet = $row['DateCreation'];
   }

   // update the product
   function update()
   {

      // update query
      $query = "UPDATE
               " . $this->table_name . "
            SET
            Immatriculation=:immatriculation, 
            Type=:type, 
            Libelle=:libelle, 
            Quantite=:quantite, 
            GerantId=:gerantId,
            DateCreation=:dateCreation
           WHERE
           Immatriculation = :immatriculation";

      // prepare query statement
      $stmt = $this->db->prepare($query);

      // sanitize
      $this->immatriculation = htmlspecialchars(strip_tags($this->immatriculation));
      $this->type = htmlspecialchars(strip_tags($this->type));
      $this->libelle = htmlspecialchars(strip_tags($this->libelle));
      $this->quantite = htmlspecialchars(strip_tags($this->quantite));
      $this->gerantId = htmlspecialchars(strip_tags($this->gerantId));
      $this->dateCreation = htmlspecialchars(strip_tags($this->dateCreation));

      // bind values
      $stmt->bindParam(":immatriculation", $this->immatriculation);
      $stmt->bindParam(":type", $this->type);
      $stmt->bindParam(":libelle", $this->libelle);
      $stmt->bindParam(":quantite", $this->quantite);
      $stmt->bindParam(":gerantId", $this->gerantId);
      $stmt->bindParam(":dateCreation", $this->dateCreation);

      // execute the query
      if ($stmt->execute()) {
         return true;
      }

      return false;
   }

   // delete the product
   function delete()
   {

      // delete query
      $query = "DELETE FROM " . $this->table_name . " WHERE Immatriculation = ?";

      // prepare query
      $stmt = $this->db->prepare($query);

      // sanitize
      $this->immatriculation = htmlspecialchars(strip_tags($this->immatriculation));

      // bind immatriculation of record to delete
      $stmt->bindParam(1, $this->immatriculation);

      // execute query
      if ($stmt->execute()) {
         return true;
      }

      return false;
   }
}
