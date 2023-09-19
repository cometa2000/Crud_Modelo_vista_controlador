<?php

    class Crud {

        private $conexion;
        private $host = "localhost";
        private $username = "root";
        private $pass = ""; 
        private $bd = "agenda2";

        public function __construct()
        {
            $this->conexion= new PDO("mysql:host=$this->host;dbname=$this->bd", $this->username, $this->pass); //nos permite conectarnos a diferentes SGBD SQL
        }

        public function read(){
            $query = "SELECT * FROM contactos";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            unset($this->conexion);
            return $result;
        }

        public function read2(){
            $query = "SELECT * FROM categorias";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            unset($this->conexion);
            return $result;
        }

        public function create($data){
            $query = "INSERT INTO `contactos` (nombre, telefono, email, categoria) Values (:nombre, :telefono, :email, :categoria)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":nombre", $data["nombre"]);
            $stmt->bindParam(":telefono", $data["telefono"]);
            $stmt->bindParam(":email", $data["email"]);
            $stmt->bindParam(":categoria", $data["categoria"]);
            $stmt->execute();
            unset($this->conexion);
            return json_encode($stmt);
        }

        public function createCate($data){
            $query = "INSERT INTO `categorias` (categoria) Values (:categoria)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":categoria", $data["categoria"]);
            $stmt->execute();
            unset($this->conexion);
            return json_encode($stmt);
        }

        public function update($data){
            $query = "UPDATE contactos SET nombre=:nombre, telefono=:telefono, email=:email, categoria=:categoria
                        WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":nombre", $data["nombre"]);
            $stmt->bindParam(":telefono", $data["telefono"]);
            $stmt->bindParam(":email", $data["email"]);
            $stmt->bindParam(":categoria", $data["categoria"]);
            $stmt->execute();
            unset($this->conexion);
            return $stmt;
        }

        public function updateCate($data){
            $query = "UPDATE categorias SET categoria=:categoria WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->bindParam(":categoria", $data["categoria"]);
            $stmt->execute();
            unset($this->conexion);
            return $stmt;
        }

        public function delete($data) {
            $query = "DELETE FROM contactos WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->execute();
            unset($this->conexion);
            return $stmt;
        }

        public function deleteCate($data) {
            $query = "DELETE FROM categorias WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $data["id"]);
            $stmt->execute();
            unset($this->conexion);
            return $stmt;
        }

        public function show($id){
            $query = "SELECT * FROM contactos WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $id);
            $result = $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            unset($this->conexion);
            return $result;
        }

        public function showCate($id){
            $query = "SELECT * FROM categorias WHERE id=:id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $id);
            $result = $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            unset($this->conexion);
            return $result;
        }
    }

?>