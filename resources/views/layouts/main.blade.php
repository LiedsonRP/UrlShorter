<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrlCutter</title>

    <!-- css das páginas-->
    <link rel="stylesheet" href={{asset('/css/layout.css')}}>
    <link rel="stylesheet" href={{asset('/css/shortPage.css')}}>
    <link rel="stylesheet" href={{asset('/css/message_box.css')}}>

    <!-- Fontes do google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Merriweather+Sans:wght@700&display=swap" rel="stylesheet">
</head>
<body>        
    
    <nav>
        <img src={{asset("/images/urlCutter_logo.svg")}}>                
    </nav>

    @yield("content")

    <footer> 
        <a href="https://github.com/LiedsonRP" id="github">
            <img src={{asset("/images/github_icon.svg")}}>
            <p>LiedsonRP</p>
        </a>        
        <div id="contact">
            <a href="https://www.linkedin.com/in/liedson-pereira-055b67231"><img src={{asset("/images/instagram_icon.svg")}}></a>
            <a href="https://liedsonreis2019@outlook.com"><img src={{asset("/images/email_icon.svg")}}></a>
        <div>
    </footer> 
    
    @stack("scripts")
</body>
</html>