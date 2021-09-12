<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ;?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/external/custom.css') ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>"
          type="text/css">
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css') ?>"
          type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/material/icons.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/material/css/new_material.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/responsive.bootstrap.min.css') ?>" type="text/css">

    <link href="<?php echo base_url('assets/select/select2.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">