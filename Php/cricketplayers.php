<!DOCTYPE html>
<html>
<head>
    <title>INDIAN CRICKET PLAYERS</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #BFECFF;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #FFF6E3;
        }
        th, td {
            	border: 2px solid #3b3a30;
            	padding: 10px;
            	text-align: center;
        }
    </style>
</head>
<body>
    <h1><u>INDIAN CRICKET PLAYERS</u></h1>
    <table>
        <tr>
            <th>Player Name</th>
        </tr>
        <?php
        $players = array(
            "Rohit Sharma", "Virat kohli", "Suryakumar Yadav", "Rishabh Pant", "Hardik Pandya", "Axar patel", "Ravindra jadeja","Arshadeep Singh", "Jasprit Bumrah"
        );

        foreach ($players as $player) {
            echo "<tr><td>$player</td></tr>";
        }
        ?>
    </table>
</body>
</html>
