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
    
       <section class="bg-[#00274d]" >
            <div class="container mx-auto flex items-center justify-between py-8" >
                <div class="text-white flex-1/2 " >
                    <h2 class="text-4xl font-semibold" >Trusted Dealer</h2>
                    <p >We find the trusted dealer for your car.</p>
                </div>
                <div class="bg-white p-4 flex-1/4 rounded shadow-md" >
                    <div class="flex gap-4 " >
                        <div class="w-[80px] h-[80px]" >
                            <img class="w-full h-full object-fit" src="https://automobiliard.com/user/resources/images/ezgif.com-resize.webp" alt="">
                        </div>
                        <div class="flex flex-col gap-2 ">
                                <h2 class="text-2xl text-blue-700" >{{$dealer->name}}</h2>
                                <div class="flex gap-3" >
                                <p><i class="fa-solid fa-phone"></i>  {{$dealer->phone_number}}</p>
                                <p><i class="fa-solid fa-car"></i>  {{ $total }} Vehicles</p>
                                </div>
                        </div>
                    </div>
    
              </div>
            </div>
            
       </section>
       <section class="container mx-auto grid grid-cols-4 py-8  " >
                            @foreach ($vehicles as $vehicle )
                                
                          
                            <div class="card bg-white shadow-md rounded-md px-3 py-2">
                                <div class="bg-zinc-800 h-[350px] rounded overflow-hidden">
                                    <a href="{{ route('vehicle.show',$vehicle->id) }}">
                                    <img class="object-fit shadow w-full h-full object-center rounded-sm" 
                                        src="{{ asset( 'storage/' . $vehicle->thumbnail) }}" 
                                        alt="Vehicle Thumbnail">
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <h2 class="text-2xl">{{ $vehicle->title }}</h2>
                                </div>
                                <div class="grid grid-cols-2 mt-3 text-slate-500">
                                    <span><i class="fas fa-tachometer-alt"></i> {{ $vehicle->mileage }}</span>
                                    <span class="text-right"><i class="fas fa-map-marker-alt"></i> {{ $vehicle->year }}</span>
                                    <span><i class="fas fa-car-side"></i> {{ $vehicle->make }}</span>
                                    <span class="text-right"><i class="fas fa-car-side"></i> {{ $vehicle->modal }}</span>
                                </div>
                                <div>
                                    <h2 class="text-3xl text-pink-500 font-bold my-3">USD$ {{ $vehicle->price }}</h2>
                                </div>
                            </div>
                            @endforeach
            </section>
    
    <x-footer></x-footer>

</body>
</html>