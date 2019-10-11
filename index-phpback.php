<?
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=test";
   $credentials = "user=postgres password=majin115";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      SELECT * from weapon;
   EOF;
   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   }
   echo "<div>武器:";
   echo "<select id=\"\">";
   echo "<option value=\"\" selected=\"selected\">选择武器</option>";
   while($row = pg_fetch_row($ret)){
      echo "<option value=\"string:化劲\" label=\"化劲\">".$row[3].$row[2]."</option>";
   }
   echo "</select>";
   echo "</div>";
   pg_close($db);
?>