<?php

include_once("../../assets/config/config.php");

$sql = "SELECT * FROM users";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

// $num_rows = count($result);
$num_rows = $stmt->rowCount();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex flex-col items-center">

        
        <table class="">

            <h2>vos utilisateurs</h2>

            <thead>

                <tr>

                    <th class="px-2 py-2 border-2">ID</th>

                    <th class="px-2 py-2 border-2">Nom</th>

                    <th class="px-2 py-2 border-2">Prénom</th>

                    <th class="px-2 py-2 border-2">Email</th>

                    <th class="px-2 py-2 border-2">Pseudo</th>

                    <th class="px-2 py-2 border-2">Mot de passe</th>

                    <th class="px-2 py-2 border-2">Role</th>

                    <th class="px-2 py-2 border-2">Action</th>

                </tr>

            </thead>

            <tbody>
                <?php

                if ($num_rows > 0) {
                
                    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC))   { //retourne la prochaine ligne de résultats sous forme d'un tableau associatif.
                ?>

                <?php foreach ($result as $row): ?>
                    <tr>
                        <td class="px-2 py-2 border-2">
                            <?php echo $row['id_user']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <?php echo $row['nom_user']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <?php echo $row['prenom_user']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <?php echo $row['mail_user']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <?php echo $row['pseudo_user']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <?php echo $row['mdp_user']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <?php echo $row['id_role']; ?>
                        </td>

                        <td class="px-2 py-2 border-2">
                            <a class="px-2 py-2 border-2 bg-green-400" href="update.php?id=<?php echo $row['id_user']; ?>">Edit</a>&nbsp;<a 
                                class="px-2 py-2 border-2 bg-red-400" href="delete.php?id=<?php echo $row['id_user']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php
                //  }
                
                }
                
                ?>

            </tbody>
        </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>

