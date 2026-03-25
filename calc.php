<html>

<head>
    <style>
        .b {
            background-color: lightgreen;
            color: red;
            padding: 15px 30px;
            text-align: center;
            font-size: 30px;
            border-radius: 50px;
        }

        .t {
            font-size: 25px;
            align-items: center;
        }

        .h {
            background-color: green;
            color: white
        }
    </style>
</head>

<body>
    <?php
    $button = [1, 2, 3, '+', 4, 5, 6, '-', 7, 8, 9, '*', 0, '.', '/', '='];
    $pressed = '';
    if (isset($_POST['pressed']) && in_array($_POST['pressed'], $button)) {
        $pressed = $_POST['pressed'];
    }
    $stored = '';
    if (isset($_POST['stored'])) { // && preg_match('~^(?:[\d.]+[*/+-]?)+$~', $_POST['stored'], $out)) {
        $stored = $_POST['stored'];
    }
    $display = $stored . $pressed;
    echo "$pressed & $stored & $display<br>";
    if (isset($_POST['AC'])) {
        $display = '';
        //~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~
        // && preg_match('~^\d+[-+*/]?+\d+$~', $stored)) {
    } elseif ($pressed == '=') {
        $display .= eval("return $stored;");
    }
    echo '<form action="" method="POST">';
    echo '<table align="center" style="width:300px; border:solid thick black;">';
    echo '<caption>  <h1 class="h" id="cal">SIMPLE CALCULATOR</h1> </caption>';
    echo '<tr align="center" bgcolor="skyblue">';
    echo "<td colspan=\"3\"><input type=\"text\" class=\"t\" value={$display}></td>";
    echo '</td>';
    echo '<td align="center"><button class="b" name="AC"  >AC</button></td>';
    echo '</tr>';

    foreach (array_chunk($button, 4) as $chunk) {
        echo "<tr>";
        foreach ($chunk as $button) {
            echo "<td", (count($chunk) != 4 ? ' colspan="4"' : ""), "><button  class=\"b\" name=\"pressed\" value=\"$button\">$button</button></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type=\"hidden\" name=\"stored\" value=\"$display\">";
    echo "</form>";
    ?>
</body>

</html>