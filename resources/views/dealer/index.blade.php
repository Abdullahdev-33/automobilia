<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <script defer src="https://kit.fontawesome.com/00e77377ee.js" crossorigin="anonymous"></script>
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Laravel</title>

    <style>
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>    
    
        <section class="h-screen w-full " >
            <div class=" relative bg-[url('https://automobiliard.com/user/resources/images/b9.png')] h-full bg-no-repeat bg-cover " >
            <div class="shadow absolute bg-black opacity-[0.6] w-full h-full"></div>    
                <div class=" relative z-10 container mx-auto text-white flex  items-center justify-around h-full overflow-hidden max-md:flex max-md:flex-col" >
                    <div class="max-md:text-center md:w-[700px]" >
                        <h2 class="text-5xl font-semibold ">Your Trusted Path to the Perfect Deal – Explore Dealer Profiles Below!</h2>
                        <p class="text-2xl mt-3" >We find you the best offer for your car</p>
                    </div>
                    <div class="md:w-[350px] w-[200px] px-3" >
                        <img class="rotate-90 object-fit h-full w-full" src="https://automobiliard.com/user/resources/images/Frame.svg"  alt="">
                    </div>
                </div>
                

            </div>
            
            <div class="relative bg-[#EEF2F9]" >
                <div class="text-center flex flex-col items-center py-8 gap-3" >
                    <span class="text-red-300" >Dive Into Dreams</span>
                    <h2 class="text-3xl font-semibold" >Trusted Dealers</h2>
                    <p class="text-base text-slate-500 max-w-[700px]" > Find detailed profiles, contact information, and explore the inventory from top-rated professionals dedicated to helping you drive home the perfect vehicle. 
                    </p>
                </div>

                <section class="relative bg-[#EEF2F9]" >
                    <div class="container mx-auto">
                        <div>
                            <h2 class="text-3xl" >{{$total}} Found Total</h2>
                        </div>
                        <div class="grid grid-cols-2" >
                            @foreach ($dealers as $dealer)
                                
                            
                            <div class="bg-white p-4  rounded shadow-md" >
                                <div class="flex gap-4 " >
                                    <div class="w-[100px] h-[100px]" >
                                        <img class="w-full h-full object-fit" src="https://automobiliard.com/user/resources/images/ezgif.com-resize.webp" alt="">
                                    </div>
                                    <div class="flex flex-col gap-2 ">
                                        <h2 class="text-2xl text-blue-700" >{{ $dealer->name }}</h2>
                                        <p><i class="fa-solid fa-phone"></i>  {{ $dealer->phone_number }}</p>
                                        <p><i class="fa-solid fa-car"></i> {{ $$dealer->vehicle_count }} Vechiles</p>
                                    </div>
                                </div>
                                <div class="flex justify-end " >
                                    <a class="block w-fit px-4 py-1 border border-red-300 rounded text-red-300" href="{{route('dealer.show' , $dealer->id)}}">View Details</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </section>
    
    <x-footer></x-footer>

</body>
</html>