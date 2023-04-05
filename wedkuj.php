<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Wędkowanie</title>
	<link rel="stylesheet" href="styl_1.css" />
</head>
<body>
	<header>
		<h1>Portal dla wędkarzy</h1>
	</header>
	<div class="leftpanel1">
		<h3>Ryby zamieszkujące rzeki</h3>
        <ol>
		<?php
			$con = new mysqli("127.0.0.1","root","","wedkowanie");
			$kw3 = 'SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM `ryby` JOIN lowisko ON ryby.id=lowisko.Ryby_id WHERE lowisko.rodzaj="3"';
            $res = $con -> query($kw3);
            $list= $res -> fetch_all(MYSQLI_ASSOC);
            for ($i=0; $i<count($list);$i++){
                echo "<li>";
				    echo $list[$i]["nazwa"];
                    echo " pływa w rzece ";
                    echo $list[$i]["akwen"];
                    echo ", ";
                    echo $list[$i]["wojewodztwo"];
                echo "</li>";
            };
		?>
        </ol>
	</div>
	<div class="rightpanel">
		<img src="ryba1.jpg" /><br>
		<a href="kwerendy.txt" download>Pobierz kwerendy</a>
	</div>
	<div class="leftpanel2">
		<h3>Ryby drapieżne naszych wód</h3>
		<table>
			<tr>
				<th>
					<p>L.p.</p>
				</th>
				<th>
					<p>Gatunek</p>
				</th>
				<th>
					<p>Występowanie</p>
				</th>
			</tr>
			<?php
				$kw1 = 'SELECT id,nazwa,wystepowanie FROM `ryby` WHERE styl_zycia="1";';
				$res = $con -> query($kw1);
				$table = $res -> fetch_all(MYSQLI_ASSOC);
				for ($i=0; $i<count($table);$i++){
                echo "<tr>";
					echo "<td>";
				    echo $table[$i]["id"];
					echo "</td>";
					echo "<td>";
                    echo $table[$i]["nazwa"];
					echo "</td>";
					echo "<td>";
                    echo $table[$i]["wystepowanie"];
					echo "</td>";
                echo "</tr>";
            };
			$con -> close();
			?>
		</table>
	</div>
	<footer>
		<p>Strone wykonał: xxxxxxxxxSJ</p>
	</footer>
</body>
</html>