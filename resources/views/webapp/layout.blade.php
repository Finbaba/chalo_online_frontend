<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../frontend/frontend.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">



    
    
    <style>
        /* Footer Fixed at Bottom */
        .footer-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #f8f9fa;
            padding: 10px 0;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Footer Links */
        .footer-nav a {
            text-decoration: none;
            color: black;
            font-size: 14px;
            text-align: center;
        }

        /* Search Input Placeholder Disappear on Click */
        .search-container input:focus::placeholder {
            color: transparent;
        }
    </style>
</head>
<body>

    <!-- Header -->
    
    

    <!-- Dynamic Content -->
    <div class="fullboxapp">
        @yield('content')
    </div>

    <!-- Footer Navigation -->
    <footer class="bottomMenu">
        <div class="innerwapperbox">
            <div class="bottomMenu_inner">
                <div class="menubx">
                    <a href="{{ route('home') }}">
                        <p><i class="bi bi-house"></i></p>
                        <div>Home</div>
                    </a>
                </div>
                <div class="menubx">
                    <a href="{{ route('discover') }}">
                        <p><i class="bi bi-compass"></i></p>
                        <div>Discover</div>
                    </a>
                </div>
                <div class="menubx">
                    <a href="{{ route('cart') }}">
                        <p><i class="bi bi-cart"></i></p>
                        <div>Cart</div>
                    </a>
                </div>
                <div class="menubx">
                    <a href="{{ route('profile') }}">
                        <p><i class="bi bi-person"></i></p>
                        <div>Profile</div>
                    </a>
                </div>
                
            </div>
        </div>
    </footer>


    <!-- <footer class="bottomMenu">
        <div class="innerwapperbox">
            <div class="row">
                <div class="col">
                    <a href="{{ route('home') }}">
                        <p><i class="bi bi-house"></i></p>
                        <div>Home</div>
                    </a>
                </div>
                <div class="col"><a href="{{ route('discover') }}">
                    <i class="bi bi-compass"></i><br>Discover</a></div>
                <div class="col"><a href="{{ route('cart') }}">
                    <i class="bi bi-cart"></i><br>Cart</a></div>
                <div class="col"><a href="{{ route('profile') }}">
                    <i class="bi bi-person"></i><br>Profile</a></div>
            </div>
        </div>
    </footer> -->



</body>
</html>
