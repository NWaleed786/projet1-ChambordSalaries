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

<h2>Modifier salarié</h2>

<form method="post">
    <input type="text" name="nom" value="<?= $s['nom'] ?>" class="form-control mb-2">
    <input type="text" name="prenom" value="<?= $s['prenom'] ?>" class="form-control mb-2">
    <input type="date" name="date_naissance" value="<?= $s['date_naissance'] ?>" class="form-control mb-2">
    <input type="date" name="date_embauche" value="<?= $s['date_embauche'] ?>" class="form-control mb-2">
    <input type="number" name="salaire" value="<?= $s['salaire'] ?>" class="form-control mb-2">
    <input type="text" name="service" value="<?= $s['service'] ?>" class="form-control mb-2">

    <button class="btn btn-primary">Modifier</button>
</form>

<?php require_once("footer.html"); ?>