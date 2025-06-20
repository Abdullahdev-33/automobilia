<header class=" py-8 bg-[#f7f9faff] sticky top-0 z-20">
            <nav class="container mx-auto flex justify-between items-center">
                <div class="md:w-[350px] sm:max-md:w-[200px] w-[130px]">
                    <img src="https://automobiliard.com/user/resources/images/AMnav.png" alt="compnay logo" class="object-fit ">
                </div>
                <div class="flex gap-8 text-base text-blue-700 font-medium max-[850px]:hidden">
                    <a href="{{ route('home') }}">Home</a>
                    <div name="nav-option" id="nav-opt" class="w-fit relative group ">
                        <button id="lg-menu" type="button" class=" peer w-fit  cursor-pointer">Buy</button>
                        <div id="lg-car-menu"  class="hidden absolute top-9 px-10 py-2 rounded border-t shadow-xl   bg-white transition">
                            <a href="/search?category=used" value="used" class="whitespace-nowrap block my-3" >Used Cars</a>
                            <a href="/search?category=new" class="block" value="new">New Cars</a>
                            
                        </div>
                        
                    </div>
                    <a href="{{ route('vehicles') }}">Search</a>
                    <a href="{{ route('dealer.index') }}">Dealers</a>
                </div>
                @if (Auth::check())
                <div class="max-[850px]:hidden  " >
                        <a href="{{ route('user.dashboard') }}" class=" cursor-pointer  ml-auto" >
                            <img class="mix-blend-multiply" width="49px" src="{{ asset('storage/' . "/" . request()->user()->profile_img) }}" alt="avatar user picture">
                        </a>
                    </div>               
                @else
                    <div class="flex gap-3 text-blue-700 font-medium text-xl max-[850px]:hidden ">
                        <a href="{{ route('login') }}">Login</a>
                        <span class="bg-blue-700 px-[1px]"></span>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                @endif
                    <button id="mbl-btn" class="min-[850px]:hidden">
                        <i class="fa-solid fa-bars "></i>
                    </button>

                    <div id="mbl-sidebar" class=" sidebar fixed py-8 top-0 left-0 -translate-x-[230px] w-fit px-3 h-screen transition all duration-300 flex flex-col text-xl gap-7 bg-white" >
                        <img src="https://automobiliard.com/user/resources/images/AMnav.png" width="200px" alt="">
                        <div class="flex flex-col gap-6" >
                            <a class="underline" href="{{ route('home') }}">Home</a>
                            <div name="nav-option" id="nav-opt" class="w-full relative ">
                                <button id="toggle-category" value="cars"  class=" border-b  cursor-pointer flex justify-between w-full"><span>Buy</span> <span><i class="fa-solid fa-chevron-down"></i></span></button>
                                <div id="car-category" class="hidden  absolute top-9 px-10   py-2 rounded border-t shadow-xl   bg-white transition">
                                    <a href="/search?category=used" value="used" class="whitespace-nowrap block my-3" >Used Cars</a>
                                    <a href="/search?category=new" class="block" value="new">New Cars</a>
                                    
                                </div>
                                
                            </div>
                            <a class="underline" href="{{ route('dealer.index') }}">Dealers</a>
                            <a class="underline" href="{{ route('search.vehicle') }}">Search</a>
                            <a class="underline" href="{{ route('user.dashboard') }}">Dashboard</a>
                        </div>
                    </div>
               
            </nav>
        </header>