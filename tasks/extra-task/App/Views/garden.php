<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        form, label, input {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 400px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>Garden</title>
</head>
<body>
<h1>Garden</h1>


<?= $number ?>

<?php //var_dump($flowers); ?>
<br>
<table>
    <?php foreach ($flowers as $flower): ?>
        <tr>
            <td><?= $flower->getId() ?></td>
            <td><?= $flower->getName() ?></td>
            <td><?= $flower->getAmount() ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<hr>
<div><a href="/">Home</a></div>
</body>
</html>