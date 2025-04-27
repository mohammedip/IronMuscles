@extends('layouts.app')

@section('title', 'IronMuscles - Home')

@section('styles')
<style>
    .hero-section {
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 90%;
        background: linear-gradient(to bottom, rgba(15, 14, 23, 0.7), rgba(15, 14, 23, 0.9));
    }
    
    .btn-primary {
        background-color: #ff8906;
        color: #fffffe;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .btn-primary:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 137, 6, 0.3);
    }
    
    .service-card {
        border: 2px solid transparent;
        transition: all 0.3s ease;
        background-color: #0f0e17;
    }
    
    .service-card:hover {
        border-color: #ff8906;
        transform: translateY(-10px);
    }
    
    .service-icon {
        color: #ff8906;
        transition: transform 0.5s;
    }
    
    .service-card:hover .service-icon {
        transform: scale(1.2);
    }
    
    .testimonial-card {
        position: relative;
        border-left: 4px solid #f25f4c;
        transition: transform 0.3s;
    }
    
    .testimonial-card:hover {
        transform: scale(1.03);
    }
    
    .pulse-button {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(255, 137, 6, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(255, 137, 6, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(255, 137, 6, 0);
        }
    }
    
    .count-number {
        font-size: 3rem;
        font-weight: 700;
        color: #ff8906;
    }
    
    .count-title {
        color: #a7a9be;
    }
    
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s, transform 0.6s;
    }
    
    .animate-on-scroll.active {
        opacity: 1;
        transform: translateY(0);
    }
    @media (max-width: 1480px) {

        .hero-section .btn-primary {
            margin-bottom: 1rem;
        }

    }
</style>
@endsection

@section('content')
<!-- Hero Section with Animation -->
<div class="relative bg-cover bg-center h-[90vh] hero-section" style="background-image: url('https://cdnjs.cloudflare.com/ajax/libs/pexels-photo-library/1/pictures/1954524/pexels-photo-1954524.jpeg');">
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4" id="home">
        <h1 class="text-6xl font-extrabold tracking-tight text-fffffe mb-2" data-aos="fade-down" data-aos-delay="100">
            <span class="text-ff8906">IRON</span><span class="text-fffffe">MUSCLE</span>
        </h1>
        <h2 class="text-4xl font-bold tracking-wide text-fffffe mb-6" data-aos="fade-up" data-aos-delay="200">
            FORGE YOUR <span class="text-f25f4c">LEGACY</span>
        </h2>
        <p class="mt-4 text-xl max-w-2xl text-a7a9be" data-aos="fade-up" data-aos-delay="300">
            Transform your physique, elevate your mindset, and reach your peak potential with our cutting-edge equipment and expert coaching.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ url('login') }}" class="btn-primary pulse-button px-8 py-4 font-bold text-lg rounded-lg">
                START YOUR JOURNEY
            </a>
            <a href="#about" class="px-8 py-4 border-2 border-fffffe text-fffffe font-bold text-lg rounded-lg hover:bg-fffffe hover:text-0f0e17 transition-colors">
                DISCOVER MORE
            </a>
        </div>
    </div>
    
</div>

<!-- Stats Counter Section -->
<div class="bg-0f0e17 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="animate-on-scroll" data-delay="100">
                <div class="count-number" data-count="{{$experienceYear}}">0</div>
                <div class="count-title">YEARS EXPERIENCE</div>
            </div>
            <div class="animate-on-scroll" data-delay="200">
                <div class="count-number" data-count="{{$adherentCount}}">0</div>
                <div class="count-title">MEMBERS</div>
            </div>
            <div class="animate-on-scroll" data-delay="300">
                <div class="count-number" data-count="{{$coachCount}}">0</div>
                <div class="count-title">EXPERT TRAINERS</div>
            </div>
          
        </div>
    </div>
</div>

<!-- About Section -->
<div id="about" class="container mx-auto py-16 px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="animate-on-scroll" data-delay="100">
            <h2 class="text-4xl font-bold text-fffffe tracking-wide mb-6">ABOUT <span class="text-ff8906">IRONMUSCLE</span></h2>
            <p class="text-lg text-a7a9be mb-6">
                Founded in 2008, IronMuscle has revolutionized the fitness industry with our state-of-the-art facilities, personalized training programs, and community-focused approach.
            </p>
            <p class="text-lg text-a7a9be mb-6">
                Our mission is to provide an inclusive and motivating environment where individuals of all fitness levels can transform their bodies and minds, guided by our team of certified experts.
            </p>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ff8906 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-a7a9be">Complete Equipment Range</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ff8906 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-a7a9be">Qualified Trainers</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ff8906 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-a7a9be">Nutrition Guidance</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-ff8906 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-a7a9be">24/7 Access</span>
                </div>
            </div>
        </div>
        <div class="relative animate-on-scroll mt-28 ml-8 lg:mt-0 lg:ml-0" data-delay="300">
            <img src="https://cdnjs.cloudflare.com/ajax/libs/pexels-photo-library/1/pictures/841130/pexels-photo-841130.jpeg" alt="Gym Interior" class="rounded-lg shadow-2xl w-full">
            <div class="absolute -bottom-6 -left-6 bg-ff8906 rounded-lg p-6 shadow-xl max-w-xs">
                <p class="text-0f0e17 font-bold text-lg">"At IronMuscle, we don't just build bodies, we build character."</p>
                <p class="text-0f0e17 font-semibold mt-2">- Reida Mohammed, Founder</p>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div id="services" class="py-16 px-6">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold text-fffffe mb-2 animate-on-scroll">OUR <span class="text-ff8906">SERVICES</span></h2>
        <p class="text-a7a9be max-w-3xl mx-auto mb-12 animate-on-scroll">From personalized training to nutrition coaching, we provide everything you need to transform your physique and lifestyle.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="service-card p-8 rounded-lg shadow-lg animate-on-scroll" data-delay="100">
                <div class="service-icon text-4xl mb-4">🏋️</div>
                <h3 class="text-2xl font-semibold text-ff8906 mb-4">PERSONAL TRAINING</h3>
                <p class="text-a7a9be">One-on-one coaching sessions tailored to your unique goals, body type, and schedule.</p>
                 
            </div>
            
            <div class="service-card p-8 rounded-lg shadow-lg animate-on-scroll" data-delay="200">
                <div class="service-icon text-4xl mb-4">💪</div>
                <h3 class="text-2xl font-semibold text-ff8906 mb-4">STRENGTH TRAINING</h3>
                <p class="text-a7a9be">Expert programming for muscle growth, strength gain, and performance enhancement.</p>
                 
            </div>
            
            <div class="service-card p-8 rounded-lg shadow-lg animate-on-scroll" data-delay="300">
                <div class="service-icon text-4xl mb-4">🥗</div>
                <h3 class="text-2xl font-semibold text-ff8906 mb-4">NUTRITION COACHING</h3>
                <p class="text-a7a9be">Customized meal plans and nutritional guidance to optimize your results and health.</p>
                 
            </div>
            
            <div class="service-card p-8 rounded-lg shadow-lg animate-on-scroll" data-delay="400">
                <div class="service-icon text-4xl mb-4">🧘</div>
                <h3 class="text-2xl font-semibold text-ff8906 mb-4">MIND & BODY</h3>
                <p class="text-a7a9be">Yoga, mobility, and recovery sessions to improve flexibility and prevent injuries.</p>
                 
            </div>
            
            <div class="service-card p-8 rounded-lg shadow-lg animate-on-scroll" data-delay="500">
                <div class="service-icon text-4xl mb-4">👥</div>
                <h3 class="text-2xl font-semibold text-ff8906 mb-4">GROUP CLASSES</h3>
                <p class="text-a7a9be">High-energy, motivating group workouts led by our expert instructors.</p>
                 
            </div>
            
            <div class="service-card p-8 rounded-lg shadow-lg animate-on-scroll" data-delay="600">
                <div class="service-icon text-4xl mb-4">📱</div>
                <h3 class="text-2xl font-semibold text-ff8906 mb-4">ONLINE COACHING</h3>
                <p class="text-a7a9be">Remote training programs for those who prefer to workout at home or while traveling.</p>
                 
            </div>
        </div>
    </div>
</div>

<!-- Membership Plans -->
<form action="{{ route('abonnement.paymentForm') }}" method="POST" id="abonnementForm">
    @csrf
    <div class="space-y-4">
        <div class="py-16 px-6 bg-0f0e17">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold text-fffffe mb-2 animate-on-scroll">MEMBERSHIP <span class="text-ff8906">PLANS</span></h2>
                <p class="text-a7a9be max-w-3xl mx-auto mb-12 animate-on-scroll">Choose the perfect membership plan that fits your lifestyle and fitness goals.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Mensuel Plan -->
                    <div class="border-2 border-a7a9be rounded-lg overflow-hidden transition-transform hover:transform hover:scale-105 animate-on-scroll" data-delay="100">
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-fffffe mb-2">Mensuel</h3>
                            <div class="text-4xl font-bold text-ff8906 my-4">150DH<span class="text-a7a9be text-lg">/month</span></div>
                        </div>
                        <div class="p-4">
                            <input type="radio" name="type_Abonnement" value="Mensuel" class="hidden" id="mensuel">
                            <button type="button" class="block w-full py-3 px-4 bg-transparent border-2 border-ff8906 text-ff8906 font-bold rounded-lg hover:bg-ff8906 hover:text-fffffe transition-colors cursor-pointer" onclick="selectPlan('mensuel')">SELECT PLAN</button>
                        </div>
                    </div>

                    <!-- Trimestriel Plan -->
                    <div class="border-2 border-ff8906 rounded-lg overflow-hidden relative transform scale-105 z-10 shadow-2xl animate-on-scroll" data-delay="100">
                        <div class="absolute top-0 right-0 bg-ff8906 text-0f0e17 py-1 px-4 font-semibold">POPULAR</div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-fffffe mb-2">Trimestriel</h3>
                            <div class="text-4xl font-bold text-ff8906 my-4">400DH<span class="text-a7a9be text-lg">/3 months</span></div>
                        </div>
                        <div class="p-4">
                            <input type="radio" name="type_Abonnement" value="Trimestriel" class="hidden" id="trimestriel">
                            <button type="button" class="block w-full py-3 px-4 bg-ff8906 text-fffffe font-bold rounded-lg hover:bg-opacity-90 transition-colors cursor-pointer" onclick="selectPlan('trimestriel')">SELECT PLAN</button>
                        </div>
                    </div>

                    <!-- Semi-annuel Plan -->
                    <div class="border-2 border-a7a9be rounded-lg overflow-hidden transition-transform hover:transform hover:scale-105 animate-on-scroll" data-delay="100">
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-fffffe mb-2">Semi-annuel</h3>
                            <div class="text-4xl font-bold text-ff8906 my-4">800DH<span class="text-a7a9be text-lg">/6 months</span></div>
                        </div>
                        <div class="p-4">
                            <input type="radio" name="type_Abonnement" value="Semi-annuel" class="hidden" id="semi-annuel">
                            <button type="button" class="block w-full py-3 px-4 bg-transparent border-2 border-ff8906 text-ff8906 font-bold rounded-lg hover:bg-ff8906 hover:text-fffffe transition-colors cursor-pointer" onclick="selectPlan('semi-annuel')">SELECT PLAN</button>
                        </div>
                    </div>

                    <!-- Annuel Plan -->
                    <div class="border-2 border-a7a9be rounded-lg overflow-hidden transition-transform hover:transform hover:scale-105 animate-on-scroll" data-delay="100">
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-fffffe mb-2">Annuel</h3>
                            <div class="text-4xl font-bold text-ff8906 my-4">1500DH<span class="text-a7a9be text-lg">/year</span></div>
                        </div>
                        <div class="p-4">
                            <input type="radio" name="type_Abonnement" value="Annuel" class="hidden" id="annuel">
                            <button type="button" class="block w-full py-3 px-4 bg-transparent border-2 border-ff8906 text-ff8906 font-bold rounded-lg hover:bg-ff8906 hover:text-fffffe transition-colors cursor-pointer" onclick="selectPlan('annuel')">SELECT PLAN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>

function selectPlan(plan) {

        document.querySelectorAll('input[name="type_Abonnement"]').forEach(radio => {
            radio.checked = false;
        });

        document.getElementById(plan).checked = true;

        document.getElementById('abonnementForm').submit();
    }
</script>



<!-- Call to Action -->
<div class="py-16 px-6 bg-gradient-to-r from-f25f4c to-e53170">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold text-fffffe mb-6 animate-on-scroll">READY TO <span class="text-0f0e17">TRANSFORM</span> YOUR BODY?</h2>
        <p class="text-fffffe text-lg max-w-2xl mx-auto mb-8 animate-on-scroll">Join IronMuscle today and start your fitness journey with a free 7-day trial and a complimentary personal training session.</p>
        <a href="{{ url('register') }}" class="inline-block px-8 py-4 bg-0f0e17 text-fffffe font-bold text-lg rounded-lg shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1 pulse-button animate-on-scroll">
            CLAIM YOUR FREE TRIAL
        </a>
    </div>
</div>

<!-- Contact Section -->
<div id="contact" class="py-16 px-6">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="animate-on-scroll" data-delay="100">
                <h2 class="text-4xl font-bold text-fffffe mb-6">GET IN <span class="text-ff8906">TOUCH</span></h2>
                <p class="text-a7a9be mb-8">Have questions or ready to join? Contact us today and one of our team members will reach out to assist you.</p>
                
                <div class="flex items-center mb-6">
                    <div class="bg-ff8906 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-0f0e17" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-a7a9be">Phone</p>
                        <p class="text-fffffe font-semibold">+33 1 23 45 67 89</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-6">
                    <div class="bg-ff8906 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-0f0e17" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-a7a9be">Email</p>
                        <p class="text-fffffe font-semibold">contact@ironmuscles.com</p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="bg-ff8906 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-0f0e17" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-a7a9be">Location</p>
                        <p class="text-fffffe font-semibold">123 Fitness Street, Paris, France</p>
                    </div>
                </div>
                
                <div class="mt-8 flex space-x-4">
                    <a href="#" class="bg-0f0e17 p-3 rounded-full text-ff8906 hover:bg-ff8906 hover:text-0f0e17 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-0f0e17 p-3 rounded-full text-ff8906 hover:bg-ff8906 hover:text-0f0e17 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-0f0e17 p-3 rounded-full text-ff8906 hover:bg-ff8906 hover:text-0f0e17 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div class="animate-on-scroll" data-delay="300">
                <form action="{{ route('contact.submit') }}" method="POST" class="bg-0f0e17 p-8 rounded-lg shadow-xl">
                    @csrf
                    <h3 class="text-2xl font-bold text-fffffe mb-6">SEND US A MESSAGE</h3>
                
                    <div class="mb-6">
                        <label for="name" class="block text-a7a9be mb-2">Full Name</label>
                        <input type="text" id="name" name="name" class="w-full bg-0f0e17 border-2 border-a7a9be rounded-lg p-3 text-fffffe focus:border-ff8906 focus:outline-none transition-colors">
                    </div>
                    
                    <div class="mb-6">
                        <label for="email" class="block text-a7a9be mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full bg-0f0e17 border-2 border-a7a9be rounded-lg p-3 text-fffffe focus:border-ff8906 focus:outline-none transition-colors">
                    </div>
                    
                    <div class="mb-6">
                        <label for="phone" class="block text-a7a9be mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="w-full bg-0f0e17 border-2 border-a7a9be rounded-lg p-3 text-fffffe focus:border-ff8906 focus:outline-none transition-colors">
                    </div>
                    
                    <div class="mb-6">
                        <label for="message" class="block text-a7a9be mb-2">Your Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full bg-0f0e17 border-2 border-a7a9be rounded-lg p-3 text-fffffe focus:border-ff8906 focus:outline-none transition-colors"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-ff8906 text-fffffe font-bold py-3 px-4 rounded-lg hover:bg-opacity-90 transition-colors">SEND MESSAGE</button>
                </form>                
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-0f0e17 border-t border-a7a9be py-10">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-fffffe mb-4">IRON<span class="text-ff8906">MUSCLE</span></h3>
                <p class="text-a7a9be">Transforming bodies and minds since 2008. Join our community and experience the difference.</p>
                <div class="mt-4 flex space-x-4">
                    <a href="#" class="text-a7a9be hover:text-ff8906 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-a7a9be hover:text-ff8906 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-a7a9be hover:text-ff8906 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold text-fffffe mb-4">QUICK LINKS</h4>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-a7a9be hover:text-ff8906 transition-colors">Home</a></li>
                    <li><a href="#about" class="text-a7a9be hover:text-ff8906 transition-colors">About Us</a></li>
                    <li><a href="#services" class="text-a7a9be hover:text-ff8906 transition-colors">Services</a></li>
                    <li><a href="#abonnementForm" class="text-a7a9be hover:text-ff8906 transition-colors">Membership</a></li>
                    <li><a href="#contact" class="text-a7a9be hover:text-ff8906 transition-colors">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold text-fffffe mb-4">OPENING HOURS</h4>
                <ul class="space-y-2 text-a7a9be">
                    <li class="flex justify-between">
                        <span>Open 24/7 – Train Anytime!</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Staff available during business hours</span>
                    </li>
                </ul>
            </div>                      
            
            <div>
                <h4 class="text-lg font-semibold text-fffffe mb-4">NEWSLETTER</h4>
                <p class="text-a7a9be mb-4">Subscribe to our newsletter for the latest updates and exclusive offers.</p>
                <form action="{{ route('newsletter.submit') }}" method="POST">
                    @csrf
                    <div class="flex">
                        <input type="email" name="email" placeholder="Your email address" 
                            class="flex-1 py-2 px-3 bg-0f0e17 border-2 border-a7a9be rounded-l-lg text-fffffe focus:border-ff8906 focus:outline-none"
                            required>
                        <button type="submit" class="bg-ff8906 text-fffffe py-2 px-4 rounded-r-lg hover:bg-opacity-90 transition-colors">SUBSCRIBE</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-8 pt-8 border-t border-a7a9be text-center">
            <p class="text-a7a9be">&copy; 2025 IronMuscle GYM. All rights reserved.</p>
        </div>
    </div>
</footer>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Number counter animation
        const countElements = document.querySelectorAll('.count-number');
        const animationDuration = 2000; // 2 seconds
        
        countElements.forEach(el => {
            const target = parseInt(el.getAttribute('data-count'));
            const increment = target / (animationDuration / 16); // 60fps
            let current = 0;
            
            const updateCount = () => {
                current += increment;
                if (current < target) {
                    el.textContent = Math.floor(current);
                    requestAnimationFrame(updateCount);
                } else {
                    el.textContent = target;
                }
            };
            
            updateCount();
        });
        
        // Animate elements on scroll
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        
        const checkIfInView = () => {
            animateElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;
                
                if (rect.top <= windowHeight * 0.8) {
                    el.classList.add('active');
                    // Add delay if specified
                    const delay = el.getAttribute('data-delay');
                    if (delay) {
                        el.style.transitionDelay = `${delay}ms`;
                    }
                }
            });
        };
        
        // Initial check
        checkIfInView();
        
        // Check on scroll
        window.addEventListener('scroll', checkIfInView);
    });
</script>
@endsection