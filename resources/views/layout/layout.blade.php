<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <!--CSS LAINNYA-->
        <style>
            .jumbotron{
                padding: 6rem 1rem;
                background: #e2edff;

            }
            .nav-link{
                color: white;
            }

            #projects{
                background: #e2edff;
            }

            section{
                padding-top: 5rem;
            }
        </style>

        <title>ORANG BIASA - @yield('title')</title>
    </head>
    <body id="home">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">ORANG BIASA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" href="/">Home</a>
                        <a class="nav-link active" href="/about">About</a>
                        <a class="nav-link active" href="/project">Projects</a>
                        <a class="nav-link active" href="/contact">Contact</a>
                        <a class="nav-link active" href="/login">Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--End of navbar--> 

        <div>
            @yield('content')
        </div>

          <!--Footer-->
          <footer class="bg-primary text-white text-center p-3">
            <p>Made with ❤ by <a href="#" class="text-white fw-bold">ORANG BIASA</a></p>
        </footer>
        <!--End of footer-->