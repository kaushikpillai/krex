<?php
  echo "<div class=\"top-panel\"> ";
  echo "<button class=\"opbut\" id=\"homeButton\"> Home </button>";
  echo "</div>";
?>  
  <script type="text/javascript">
    document.getElementById("homeButton").onclick = function () 
    {
        location.href = "index.php";
    };
  </script>


