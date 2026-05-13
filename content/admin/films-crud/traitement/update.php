<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../../assets/config/config.php");

if (!isset($_POST['update'])) {
    header('Location: /content/admin/films-crud/admin-view.php');
    exit;
}

$id       = (int) $_POST['id-film'];
$img      = trim($_POST['img-film']);
$titre    = trim($_POST['nom-film']);
$date     = (int) $_POST['date-film'];
$synopsis = trim($_POST['synopsis-film']);
$ba       = trim($_POST['ba-film'] ?? '');

// Update infos film
$stmt = $pdo->prepare("UPDATE films SET img_film=:img, nom_film=:titre, date_film=:date, synopsis_film=:synopsis, ba_film=:ba WHERE id_film=:id");
$stmt->execute([':img'=>$img, ':titre'=>$titre, ':date'=>$date, ':synopsis'=>$synopsis, ':ba'=>$ba, ':id'=>$id]);

foreach ($_POST['new_genres'] ?? [] as $ng) {
    $ng = trim($ng); if (!$ng) continue;
    $pdo->prepare("INSERT IGNORE INTO genres (nom_genre) VALUES (?)")->execute([$ng]);
    $r = $pdo->prepare("SELECT id_genre FROM genres WHERE nom_genre = ?"); $r->execute([$ng]);
    $newId = $r->fetchColumn(); if ($newId) $_POST['genres'][] = $newId;
}
foreach ($_POST['new_realisateurs'] ?? [] as $nr) {
    $nr = trim($nr); if (!$nr) continue;
    $pdo->prepare("INSERT IGNORE INTO realisateurs (nom_realisateur) VALUES (?)")->execute([$nr]);
    $r = $pdo->prepare("SELECT id_realisateur FROM realisateurs WHERE nom_realisateur = ?"); $r->execute([$nr]);
    $newId = $r->fetchColumn(); if ($newId) $_POST['realisateurs'][] = $newId;
}
foreach ($_POST['new_acteurs'] ?? [] as $na) {
    $na = trim($na); if (!$na) continue;
    $pdo->prepare("INSERT IGNORE INTO acteurs (nom_acteur) VALUES (?)")->execute([$na]);
    $r = $pdo->prepare("SELECT id_acteur FROM acteurs WHERE nom_acteur = ?"); $r->execute([$na]);
    $newId = $r->fetchColumn(); if ($newId) $_POST['acteurs'][] = $newId;
}

// Resync liaisons : supprimer les anciennes puis réinsérer les cochées
$pdo->prepare("DELETE FROM possede WHERE id_film = ?")->execute([$id]);
$pdo->prepare("DELETE FROM tourner WHERE id_film = ?")->execute([$id]);
$pdo->prepare("DELETE FROM possede2 WHERE id_film = ?")->execute([$id]);

if (!empty($_POST['genres'])) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO possede (id_film, id_genre) VALUES (?, ?)");
    foreach ($_POST['genres'] as $gid) { $stmt->execute([$id, (int)$gid]); }
}
if (!empty($_POST['realisateurs'])) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO tourner (id_film, id_realisateur) VALUES (?, ?)");
    foreach ($_POST['realisateurs'] as $rid) { $stmt->execute([$id, (int)$rid]); }
}
if (!empty($_POST['acteurs'])) {
    $stmt = $pdo->prepare("INSERT IGNORE INTO possede2 (id_film, id_acteur) VALUES (?, ?)");
    foreach ($_POST['acteurs'] as $aid) { $stmt->execute([$id, (int)$aid]); }
}

header('Location: /content/admin/films-crud/admin-view.php');
exit;
?>