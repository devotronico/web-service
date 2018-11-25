
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>webservice</title>
</head>
<body>
    <div class="container">
        <nav class="navigation">
            <ul class="navigation__list">
                <li class="navigation__item"><a class="navigation__link" href="/home">Home</a></li>
                <li class="navigation__item"><a class="navigation__link" href="/page/1">Page</a></li>
                <li class="navigation__item"><a class="navigation__link" href="/contact">Contact</a></li>
                <li class="navigation__item"><a class="navigation__link" href="/about">About</a></li>
                <li class="navigation__item"><a class="navigation__link" href="/function/5/10">Function</a></li>
                <li class="navigation__item"><a class="navigation__link" id="navigation__ajax" href="/ajax/3">Ajax</a></li>
            </ul>
        </nav>
        <div class="row justify-content-center mt-5 text-center">
            <div class="col-md-2">Ajax =></div>
            <div class="col-md-4"><div class="ajax-response">...</div></div>
        </div>
        <div class="template">
            <p><?=$this->template?></p>
        </div>
    </div>
    <script src="/js/main.js"></script>
</body>
</html>
