<!DOCTYPE html>
<html lang="en">
<head>
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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Julian - @yield('name')</title>
</head>
<body>
    @section('navbar')
     <!--Navbar-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Julian Fernando Ekapanca Putra</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="/home">Home</a>
                    <a class="nav-link active" href="/about">About</a>
                    <a class="nav-link active" href="/projects">Projects</a>
                    <a class="nav-link active" href="/contact">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    @show
    <!--End of navbar-->  
    
        @yield('content')

    @section('footer')
    <!--Footer-->
    <footer class="bg-primary text-white text-center p-3">
        <p>Made with ❤ by <a href="#" class="text-white fw-bold">Alexander Sebastian Richard</a></p>
    </footer>
   
    <!--End of footer-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
   @show
</body>
<html>