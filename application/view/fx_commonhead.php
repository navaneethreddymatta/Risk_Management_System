<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type="image/png" href="assets/img/rms.png">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>RMS</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/datatable.css">
		<link rel="stylesheet" href="assets/css/main.css">
		
		
		<script src="assets/js/jquery.min.js"></script>				
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/app.js"></script>
		<script src="assets/js/datatable.js"></script>
		
		<style>
		#ex1Slider .slider-selection {
			background: #6AD2EB;
		}
		#errMsg{
			color:Red;
		}
		.grid .tick {
			stroke: lightgrey;
			stroke-opacity: 0.7;
			shape-rendering: crispEdges;
		}
		.detailsLabel{
			float:left;
			font-size:9pt;
			font-family:Arial;
			font-weight:bold;
			margin-left:8px;
		}
		.detailsValue{
			float:left;
			border-bottom:1px solid black;
			font-size:9pt;
			font-family:Arial;
			margin-right:5px;
		}
		.sectionBlocks{
			height:80px;
			border-right:1px solid black;
			float:left;
			text-align:center;
			font-size:10pt;
			font-family:Arial;
			font-weight:bold;
		}
		.section{
			line-height:20px;
			text-align:left;
			border-top:1px solid black;
			padding-left:5px;
			height:20px;
		}
		.regNum{
			float:left;
			font-size:20pt;
			font-family:Arial;
			font-weight:bold;
			margin-top:5px;
			width:33%;
		}
		.regSet{
			float:left;
			font-size:16pt;
			font-family:Arial;
			font-weight:bold;
			margin-top:8px;
			width:33%;
		}
		.partLabel{
			line-height:25px;
			text-align:center;
			font-family:Arial;
			font-weight:bold;
			font-size:11pt;
		}
		.part2Index{
			width:40px;
			border-right:1px solid black;
			line-height:62px;
			height:62px;
			font-family:Arial;
			font-size:11pt;
			text-align:center;
		}
		</style>
	</head>
	<body>		
		<div class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed" id="page-container">
