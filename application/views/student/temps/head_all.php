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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/custom.css') ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>"
          type="text/css">
    <link rel="stylesheet"
          href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css') ?>"
          type="text/css">

    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-indigo.min.css" />

    <link rel="stylesheet" href="<?php echo base_url('assets/material/icons.css') ?>" type="text/css">
    <!-- <link rel="stylesheet" href="<?php /*echo base_url('assets/material/css/material.css') */?>">
    <link rel="stylesheet" href="<?php /*echo base_url('assets/material/css/material.min.css') */?>" type="text/css">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/responsive.bootstrap.min.css') ?>" type="text/css">
</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">