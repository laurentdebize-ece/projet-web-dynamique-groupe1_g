<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de modification</title>
    <style>
        body {
            background-color: #f7f3f7;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #5e366a;
            margin-bottom: 10px;
        }

        form {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        th {
            text-align: left;
            color: #5e366a;
            font-weight: bold;
        }

        td {
            padding: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #d9d9d9;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #5e366a;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #7e5492;
        }
    </style>
</head>
<body>
    <!-- Modif d'un étudiant -->
    <h2>Modifier un étudiant</h2>
    <form action="modifier2.php" method="post">
        <table>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="emaileleve"></td>
            </tr>
            <tr>
                <th>Mot de passe</th>
                <td><input type="password" name="motdepasse"></td>
            </tr>
            <tr>
                <th>Numéro de classe</th>
                <td><input type="text" name="numeroclasse"></td>
            </tr>
            <tr>
                <th>École</th>
                <td><input type="text" name="ecole"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="valider1" value="Valider">
                </td>
            </tr>
        </table>
    </form>

    <!-- Modif d'un prof -->
    <h2>Modifier un professeur</h2>
    <form action="modifier2.php" method="post">
        <table>
            <tr>
                <th>Nom</th>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="emailprof"></td>
            </tr>
            <tr>
                <th>Mot de passe</th>
                <td><input type="password" name="motdepasse"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="valider2" value="Valider">
                </td>
            </tr>
        </table>
    </form>

    <!-- Modif d'une matière -->
    <h2>Modifier une matière</h2>
    <form action="modifier2.php" method="post">
        <table>
            <tr>
                <th>Nom de la matière</th>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <th>Numéro de la matière</th>
                <td><input type="text" name="numeromatiere"></td>
            </tr>
            <tr>
                <th>Volume horaire</th>
                <td><input type="text" name="volumehoraire"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="valider3" value="Valider">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
