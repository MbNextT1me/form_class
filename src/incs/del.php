<?php
include "Request_form.php";

$data = array();

if (!empty($_POST)) {
    $data = $_POST;
}

$form = new Request_form(0);

$form->dellRows($data);

header('Location: ../php/admin.php');