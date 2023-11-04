<?php


$host = "localhost";
$port = 3306;
$database = "databas1";
$username = "root";
$password = "";

// create connection
$connection = new mysqli($host, $username, $password, $database, $port);

function skrivLogg ($meddelande) {
    echo file_get_contents("loggfil.txt");
};

// check connection
if($connection->connect_error != null){
    die("Anslutningen misslyckades: " . $connection->connect_error);
}else{
    echo "Anslutningen lyckades.";
}

$query1 = "CREATE TABLE IF NOT EXISTS products(
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50),
sku VARCHAR(16),
price FLOAT,
stock INT,
saleable BOOLEAN,
created DATE
)";

$query3 = "CREATE TABLE IF NOT EXISTS customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(50),
    customer_phone INT,
    customer_email VARCHAR(50)
)";

$query4 = "CREATE TABLE IF NOT EXISTS orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    total FLOAT,
    created DATE
)";

$query5 = "CREATE TABLE IF NOT EXISTS order_item (
    order_items_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT,
    subtotal FLOAT,
    created DATE
)";

$query21 = "INSERT INTO order_item (order_id, product_id, quantity, subtotal, created) 
VALUES (2, 3, 6, 93.95, '2023-11-02');";
$query24 = "INSERT INTO order_item (order_id, product_id, quantity, subtotal, created) 
VALUES (1, 2, 3, 19.95, '2023-11-02');";

$query23 = "INSERT INTO orders (customer_id, total, created) 
VALUES (10, 500, '2023-11-02');";

// SQL-fråga för att infoga data i tabellen
$query2 = "INSERT INTO products (name, sku, price, stock, saleable, created)
VALUES ('Kaffe', 'kaffe', 59.95 , 37, TRUE, '2023-04-14');";
$query7 = "INSERT INTO products (name, sku, price, stock, saleable, created)
VALUES ('Mjölk', 'mjölk', 23.95 , 58, TRUE, '2023-04-09');";
$query9 = "INSERT INTO products (name, sku, price, stock, saleable, created)
VALUES ('Socker', 'socker', 12.95 , 78, TRUE, '2023-04-09');";
$query10 = "INSERT INTO products (name, sku, price, stock, saleable, created)
VALUES ('Honung', 'honung', 89.95 , 12, TRUE, '2023-09-18');";
$query11 = "INSERT INTO products (name, sku, price, stock, saleable, created)
VALUES ('Havremjölk', 'havremjölk', 18.95 , 502, TRUE, '2023-09-23');";

$query12 = "INSERT INTO customers (customer_name, customer_phone, customer_email)
VALUES ('Adam Jönsson', 0764032977, 'user1@email.com');";

$query13 = "INSERT INTO customers (customer_name, customer_phone, customer_email)
VALUES ('Malin Andersson', 0764032978, 'user2@email.com');";

$query14 = "INSERT INTO customers (customer_name, customer_phone, customer_email)
VALUES ('Björn Karlsson', 0764032979, 'user3@email.com');";

$query15 = "INSERT INTO customers (customer_name, customer_phone, customer_email)
VALUES ('Jonas Nilsson', 0764032980, 'user4@email.com');";

$query16 = "INSERT INTO orders (customer_name, customer_phone, customer_email)
VALUES ('Jonas Nilsson', 0764032980, 'user4@email.com');";

$query6 = "UPDATE products SET name = 'Gevalia' where sku = 'kaffe'";

$query8 = "DELETE FROM products WHERE name = 'Mjölk'";

$query30 ="UPDATE FROM ";

// Radera kunder, ordrar, ordervaror
// När en order raderas skall alla dess ordervaror också tas bort.
//$query40 ="DELETE FROM orders WHERE order_id = 1";
//$query41 ="DELETE FROM order_items WHERE order_id = 1";

$orderId = 1;

function deleteOrderItem ($connection, $orderId) {
    $query41 ="DELETE FROM order_item WHERE order_id = 1";
    $connection->query($query41);
};

function deleteOrder ($connection, $orderId){
    deleteOrderItem($connection, $orderId);

    $query40 ="DELETE FROM orders WHERE order_id = 1";
    $connection->query($query40);

    if ($connection->query($query40) === TRUE){
        echo "Order med assoc order-items är raderad.";
    }else{
        echo "Fel vid radering av order.";
    }
    

};

deleteOrder($connection, $orderId);


// kör SQL-frågan och returnera resultatet (antalet påverkade rader returneras)
//$result = $connection->query($query40);

// skriv ut resultatet
if ($result != null) {
    echo "Tabell uppdaterad!";
}else{
    die("Kunde ej uppdatera tabell: ") . $connection->connect_error;
}

if ($connection->query($query1) === TRUE){
    echo "Tabellen products har skapats";
}else{
    echo "Fel vid skapandet av tabellen.";
}

// stäng anslutningen
$connection->close();

?>