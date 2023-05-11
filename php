<?php
$sql = "CREATE DATABASE omnesmyskills";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
?>

<?php
$sql = "CREATE TABLE omnesmyskills.élève (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
age INT(3) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>

<?php
$sql = "INSERT INTO omnesmyskills.élève (nom, prénom)
VALUES ('Bernot', 'Julia')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

<?php
$sql = "CREATE TABLE omnesmyskills.prof (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
age INT(3) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>

<?php
$sql = "INSERT INTO omnesmyskills.prof (nom, prénom, matière)
VALUES ('Micherin', 'Sylvie' , 'Mathématiques')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

//commentaires 
