<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<head>
	<link rel="icon" href="<?=base_url();?>resources/images/logo-white.png" type="image">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<!-- <script src="https://kit.fontawesome.com/a9c0f8f83c.js" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.16.0/bootstrap-table.js"></script>

	<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
	<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
	<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
	<script src="https://unpkg.com/xlsx@0.16.0/xlsx.mini.js"></script>
	<script src="<?= base_url() ?>resources/js/html2canvas.min.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/export/bootstrap-table-export.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/placeholder-loading/dist/css/placeholder-loading.min.css"/>
  	
  	<link rel="stylesheet" type="text/css" href="<?=base_url();?>resources/css/bootstrap-editable.css">
  	<link rel="stylesheet" type="text/css" href="<?=base_url();?>resources/css/style.css">
	<title>D'Gathering</title>
</head>
<body class="bg-light">