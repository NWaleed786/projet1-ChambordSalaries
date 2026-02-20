<?php
require_once("header.html");
require_once("fonctions.php");

$salaries = getSalaries();
?>

<h2>Liste des salariés</h2>

<a href="ajouter.php" class="btn btn-success mb-3">Ajouter salarié</a>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date naissance</th>
    <th>Date embauche</th>
    <th>Salaire</th>
    <th>Service</th>
    <th>Actions</th>
</tr>

<?php foreach($salaries as $s) { ?>
<tr>
    <td><?= $s['id'] ?></td>
    <td><?= $s['nom'] ?></td>
    <td><?= $s['prenom'] ?></td>
    <td><?= $s['date_naissance'] ?></td>
    <td><?= $s['date_embauche'] ?></td>
    <td><?= $s['salaire'] ?></td>
    <td><?= $s['service'] ?></td>
    <td>
        <a href="modifier.php?id=<?= $s['id'] ?>" class="btn btn-primary btn-sm">Modifier</a>
        <a href="supprimer.php?id=<?= $s['id'] ?>" class="btn btn-danger btn-sm"
        onclick="return confirm('Supprimer ?')">Supprimer</a>
    </td>
</tr>
<?php } ?>
</table>

<hr>

<h4>Statistiques</h4>
<p>Nombre total : <?= getNombreSalaries(); ?></p>
<p>Salaire moyen : <?= getSalaireMoyen(); ?></p>
<p>Salaire max : <?= getSalaireMax(); ?></p>
<p>Salaire min : <?= getSalaireMin(); ?></p>

<h5>Nombre par service</h5>
<ul>
<?php foreach(getNombreParService() as $service) { ?>
    <li><?= $service['service'] ?> : <?= $service['total'] ?></li>
<?php } ?>
</ul>

<?php require_once("footer.html"); ?>