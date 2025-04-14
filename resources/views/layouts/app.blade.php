<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IronMuscle - Premium Fitness')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        '0f0e17': '#0f0e17',
                        'fffffe': '#fffffe',
                        'a7a9be': '#a7a9be',
                        'ff8906': '#ff8906',
                        'f25f4c': '#f25f4c',
                        'e53170': '#e53170'
                    },
                    fontFamily: {
                        'sans': ['Montserrat', 'sans-serif'],
                        'heading': ['Oswald', 'sans-serif']
                    },
                    backgroundImage: {
                        'hero-pattern': "url('https://cdnjs.cloudflare.com/ajax/libs/pexels-photo-library/1/pictures/1954524/pexels-photo-1954524.jpeg')"
                    }
                }
            }
        };
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #0f0e17;
            font-family: 'Montserrat', sans-serif;
            color: #fffffe;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Oswald', sans-serif;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #0f0e17;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #ff8906;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #f25f4c;
        }
        
        /* Preloader */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0f0e17;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        
        .preloader.fade-out {
            opacity: 0;
        }
        
        .spinner {
            width: 60px;
            height: 60px;
            border: 5px solid #a7a9be;
            border-top: 5px solid #ff8906;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Navbar styling */
        .navbar {
            transition: background-color 0.3s, padding 0.3s;
        }
        
        .navbar.scrolled {
            background-color: rgba(15, 14, 23, 0.95);
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .nav-link {
            position: relative;
            color: #fffffe;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: #ff8906;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #ff8906;
            transition: width 0.3s, left 0.3s;
        }
        
        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }
        
        /* Admin sidebar styling */
        .sidebar {
            background-color: #0f0e17;
            border-right: 1px solid #a7a9be;
            transition: width 0.3s, transform 0.3s;
        }
        
        .sidebar-link {
            transition: background-color 0.3s, color 0.3s;
        }
        
        .sidebar-link:hover {
            background-color: #ff8906;
            color: #0f0e17;
        }
        
        .sidebar-link.active {
            background-color: #ff8906;
            color: #0f0e17;
        }
        
        /* Button animations */
        .btn-anim {
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            position: relative;
        }
        
        .btn-anim:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 137, 6, 0.3);
        }
        
        .btn-anim::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s;
        }
        
        .btn-anim:hover::before {
            left: 100%;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    @auth
    @include('components.topbar')
    @endauth
    <div class="flex">
        <!-- Sidebar -->

        @auth
            @role('admin')
                @include('components.sidebar')
            @endrole
        @endauth


        <!-- Main Content -->
        <main class="flex-1 p-6">
            
            
                @yield('content')
        </main>
    </div>

    <!-- Back to Top Button -->
    <a href="#" id="back-to-top" class="fixed bottom-6 right-6 bg-ff8906 text-fffffe rounded-full p-3 shadow-lg opacity-0 invisible transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </a>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // Back to top button
            const backToTopButton = document.getElementById('back-to-top');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });
            
            backToTopButton.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    if (this.getAttribute('href') === '#') return;
                    
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                });
            });
        });
    </script>
    
    @yield('scripts')
    @yield('planningScript')
    @yield('chartScripts')
    @yield('topbarScripts')
    @yield('sidebarScripts')

</body>
</html>