<?php

$servername = "<SERVERNAME>";
$username = "<USERNAME>";
$password = "<PASSWORD>";
$dbname = "<DBNAME>";
    
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
    
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
    
function createTables(){
    global $conn;
    $sql = "CREATE TABLE news (
        id INT AUTO_INCREMENT PRIMARY KEY,
        image VARCHAR(100),
        meta_data VARCHAR(100),
        original_url varchar(150),
        title varchar(250),
        content text
        )";
        mysqli_query($conn, $sql);
    }
    
function insertData($data){
    global $conn;
    $sql = "INSERT INTO `news`( `image`, `meta_data`, `original_url`, `title`, `content`) 
    VALUES ('{$data['image']}','{$data['date']}','{$data['link']}','{$data['title']}','{$data['content']}')";
    if (! mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// $item = [
//     'title'=>'title',
//     'date'=>'date',
//     'image'=>'image',
//     'link'=>'link',
//     'short_content'=>'short content',
//     'content'=>'news'
// ];
// insertData($item);
// createTables();
// mysqli_close($conn);
?>