<!DOCTYPE html>
<html>
	<head lang="fr">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta charset="UTF-8">
		<title>Todorizer</title>
		<link rel="stylesheet" type="text/css" href="assets/style/reset.css" />
        <link rel="stylesheet" type="text/css" href="assets/style/font.css" />
        <link rel="stylesheet" type="text/css" href="assets/style/checkbox.css" />
        <link href="static/fontawesome-all.css" rel="stylesheet">
        <link href="assets/style/fontawesome-all.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/style/responsive.css" />
        <link rel="stylesheet" type="text/css" href="assets/style/dragula.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,400i,500,500i,700,700i" rel="stylesheet"> 
	</head>
    <body>
        
<!--        LOADER      -->
        <style>
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        </style>
        <div id="container-loader" style="
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
            width: 100vw;
            background: white;
            z-index: 999;
        ">
            <div class="loader" style="
                border-top: 16px solid blue;
                border-right: 16px solid green;
                border-bottom: 16px solid red;
                border-left: 16px solid pink;
                border-radius: 50%;
                width: 120px;
                height: 120px;
                animation: spin 1s linear infinite;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            "></div>
        </div>
        <script>
            window.onload = function() {
                document.getElementById('container-loader').style.display = 'none';
            } 
        </script>