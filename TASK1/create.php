<?php
include ("db.php");
$users = $conn->query("CREATE TABLE crud_api.products (id INT NOT NULL AUTO_INCREMENT , PRO_name VARCHAR(100) NOT NULL , amount INT NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB;");
$Query=$conn->query("INSERT INTO products (id, PRO_name, amount) VALUES (NULL, 'phone', '1000'), (NULL, 'laptop', '200')");
if($Query==true){
    echo " TRUE";
}
$uSerS = $conn->query("SELECT * FROM products");
while ($row = $uSerS->fetch_assoc()) {
    echo"<br>".$row["id"]."<br>".$row["PRO_name"]." <br>".$row["amount"];

}