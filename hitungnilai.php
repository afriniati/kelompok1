<?php
include "class.php";
$dosen = new nilai ();
$dosen->hitungNilai($id);
?>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/component.css" type="text/css"/>
<link rel="stylesheet" href="css/menu.css" type="text/css"/>

<script src="jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="content">

<div id="hasil"></div>
<script src="jquery-1.9.1.js"></script>
<script type="text/javascript">
function loadAbsen(x)
{
	 
     $.ajax({
                type : "POST",
                url : "get_nilai.php",
                data : 'id_nilai=' + x,
                success : function(html)
                {
                    $('#hasil').html(html);
                }
            });
}

</script>

</div>
<div id="footer" class="noPrint"></div>
</body>
</html>