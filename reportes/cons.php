<?php


class cons
{

    public static function iniciar()
    {

        $dbh = new PDO("pgsql:host=10.0.0.28;dbname=pe_dlc_desaia", "postgres", "Diris@123");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbh;
    }

}