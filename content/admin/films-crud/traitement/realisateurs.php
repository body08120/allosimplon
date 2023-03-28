<?php
// var_dump($_POST['action']);
// die();
if (isset($_POST['action'])) {
if ($_POST['action'] == 'selectionner') {
echo 'select';

} elseif ($_POST['action'] == 'ajouter') {
echo 'ajout';
}
}
?>