<?php
require_once("connexion.php");

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM salaries WHERE id=?");
$stmt->execute([$id]);
$s = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("UPDATE salaries 
                            SET nom=?, prenom=?, date_naissance=?, date_embauche=?, salaire=?, service=? 
                            WHERE id=?");

    $stmt->execute([
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['date_naissance'],
        $_POST['date_embauche'],
        $_POST['salaire'],
        $_POST['service'],
        $id
    ]);

    header("Location: listeSalaries.php");
    exit();
}

require_once("header.html");
?>