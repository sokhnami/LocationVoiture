<?php
class Utilisateurs
{

   // database connection and table name
   private $db;
   private $table_name = "utilisateurs";
   private $id;
   private $nom;
   private $prenom;
   private $adresse;
   private $telephone;
   private $statut;
   private $Numero_CNI;
   private $dateNaissance;
   private $lieuNaissance;
   private $login;
   private $motDePasse;
   private $roleId;

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

   public function getId()
   {
      return $this->id;
   }
   public function setId($id)
   {
      $this->id = $id;
   }

   public function getNom()
   {
      return $this->nom;
   }
   public function setNom($nom)
   {
      $this->nom = $nom;
   }

   public function getPrenom()
   {
      return $this->prenom;
   }
   public function setPrenom($prenom)
   {
      $this->prenom = $prenom;
   }

   public function getAdresse()
   {
      return $this->adresse;
   }
   public function setAdresse($adresse)
   {
      $this->adresse = $adresse;
   }

   public function getTelephone()
   {
      return $this->telephone;
   }
   public function setTelephone($telephone)
   {
      $this->telephone = $telephone;
   }

   public function getStatut()
   {
      return $this->statut;
   }
   public function setStatut($statut)
   {
      $this->statut = $statut;
   }
   public function getNumero_CNI()
   {
      return $this->numero_CNI;
   }
   public function setNumero_CNI($statut)
   {
      $this->numero_CNI = $numero_CNI;
   }
   public function getNumero_CNI()
   {
      return $this->numero_CNI;
   }
   public function setNumero_CNI($numero_CNI)
   {
      $this->numero_CNI = $numero_CNI;
   }
   public function getDateNaissance)
   {
      return $this->dateNaissance;
   }
   public function setDateNaissance($dateNaissance)
   {
      $this->dateNaissance= $dateNaissance;
   }
   public function getLieuNaissance()
   {
      return $this->lieuNaissance;
   }
   public function setLieuNaissance($lieuNaissance)
   {
      $this->lieuNaissance = $lieuNaissance;
   }
   public function getLogin()
   {
      return $this->login;
   }
   public function setLogin($login)
   {
      $this->login = $login;
   }
   public function getMotDePasse()
   {
      return $this->motDePasse;
   }
   public function setMotDePasse($motDePasse)
   {
      $this->motDePasse = $motDePasse;
   }
   public function getRoleId()
   {
      return $this->roleId;
   }
   public function setRoleId($roleId)
   {
      $this->roleId = $roleId;
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
