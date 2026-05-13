<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../../assets/config/config.php");

if (!isset($_POST['submit'])) {
    header('Location: /content/admin/films-crud/admin-create.php');
    exit;
}

$affiche  = trim($_POST['img_film']);
$titre    = trim($_POST['nom_film']);
$date     = (int) $_POST['date_film'];
$synopsis = trim($_POST['synopsis_film']);
$ba       = trim($_POST['ba_film'] ?? '');

// Insert film
$stmt = $pdo->prepare("INSERT INTO films (img_film, nom_film, date_film, synopsis_film, ba_film) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$affiche, $titre, $date, $synopsis, $ba]);
$id_film = $pdo->lastInsertId();

// Nouveaux genres saisis manuellement (valeur = nom texte)
foreach ($_POST['new_genres'] ?? [] as $ng) {
    $ng = trim($ng);
    if (!$ng) continue;
    $pdo->prepare("INSERT IGNORE INTO genres (nom_genre) VALUES (?)")->execute([$ng]);
    $r = $pdo->prepare("SELECT id_genre FROM genres WHERE nom_genre = ?");
    $r->execute([$ng]);
    $newId = $r->fetchColumn();
    if ($newId) $_POST['genres'][] = $newId;
}

// Nouveaux réalisateurs
foreach ($_POST['new_realisateurs'] ?? [] as $nr) {
    $nr = trim($nr);
    if (!$nr) continue;
    $pdo->prepare("INSERT IGNORE INTO realisateurs (nom_realisateur) VALUES (?)")->execute([$nr]);
    $r = $pdo->prepare("SELECT id_realisateur FROM realisateurs WHERE nom_realisateur = ?");
    $r->execute([$nr]);
    $newId = $r->fetchColumn();
    if ($newId) $_POST['realisateurs'][] = $newId;
}

// Nouveaux acteurs
foreach ($_POST['new_acteurs'] ?? [] as $na) {
    $na = trim($na);
    if (!$na) continue;
    $pdo->prepare("INSERT IGNORE INTO acteurs (nom_acteur) VALUES (?)")->execute([$na]);
    $r = $pdo->prepare("SELECT id_acteur FROM acteurs WHERE nom_acteur = ?");
    $r->execute([$na]);
    $newId = $r->fetchColumn();
    if ($newId) $_POST['acteurs'][] = $newId;
}

// Liaisons genres
if (!empty($_POST['genres'])) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO possede (id_film, id_genre) VALUES (?, ?)");
    foreach ($_POST['genres'] as $id_genre) {
        $stmt->execute([$id_film, (int)$id_genre]);
    }
}

// Liaisons réalisateurs
if (!empty($_POST['realisateurs'])) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO tourner (id_film, id_realisateur) VALUES (?, ?)");
    foreach ($_POST['realisateurs'] as $id_real) {
        $stmt->execute([$id_film, (int)$id_real]);
    }
}

// Liaisons acteurs
if (!empty($_POST['acteurs'])) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO possede2 (id_film, id_acteur) VALUES (?, ?)");
    foreach ($_POST['acteurs'] as $id_acteur) {
        $stmt->execute([$id_film, (int)$id_acteur]);
    }
}

header('Location: /content/admin/films-crud/admin-view.php');
exit;
?>