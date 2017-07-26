<?php
    putenv('ODBCSYSINI=/usr/local/etc');
    putenv('ODBCINI=/usr/local/etc/odbc.ini');
    $username = "sa";
    $password = "Micr0!nvest";
    try {
      $dbh = new PDO("odbc:MSSQLServer",
                    "$username",
                    "$password"
                   );
    } catch (PDOException $exception) {
      echo $exception->getMessage();
      exit;
    }
    echo var_dump($dbh);
    unset($dbh); 