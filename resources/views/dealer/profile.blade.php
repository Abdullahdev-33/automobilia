<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <header class="flex container items-center justify-between px-3 py-8 mx-auto" >
        <a href="{{ route('home') }}" class="hover:underline" >Dashboard</a>
        <a href="{{ route('home') }}"  >
            <img width="155px" height="155px" src="https://automobiliard.com/user/resources/images/AMnav.png" alt=" imgage logo">
        </a>
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" href="{{ route('register') }}" class="hover:underline" >Logout</button>
        </form>
    </header>


    <section class="flex gap-3 items-start justify-center" >
        
        <div class="w-fit text-center" >
            <h2 class="text-3xl font-semibold " >Credentials & Personal Information.</h2>
            @if (session('success'))
                    <span class="text-green-500" > {{ session('success') }} </span>
            @endif
            <form action="{{ route('user.update') }}" enctype="multipart/form-data" method="post" class="flex gap-5 flex-col items-center text-slate-500 py-8 " >
                @csrf
                <div class="relative text-center w-fit" >
                    <div class="h-[350px] w-[350px] " >
                        <button id="closePreview" type="button"  class="absolute hidden z-999 -top-5 px-3 py-1 -right-2 bg-slate-300 rounded-full" ><i class="fa-solid fa-xmark"></i></button>
                        <img id="preview" class="preview rounded-full z-1 w-full h-full object-cover " src="{{ asset('storage/' . $user->profile_img) }}" accept=".jpeg, .png, .webp, .jpg" alt="user picture">
                    </div>
                    <label for="profile" class="relative h-full w-fit bg-pink-500 cursor-pointer text-white rounded shadow px-3 py-4 font-semibold hover:bg-pink-400  hover:border-pink-700 transition-all duration-500 border">
                        Upload Pic
                        <input id="profile" type="file" class="opacity-[0] hidden" name="upload_profile">
                    </label>
                </div>
                <div class="input-box flex flex-col items-start gap-3 w-full  " >
                    <label for="name">Name: </label>
                    <input type="text" class=" w-full outline-none border border-slate-300 bg-slate-100 px-3 py-2 rounded shadow" name="name" placeholder="Username" value="{{ $user->name }}" >
                    @error('name')
                        <span class="text-red-700" >{{ $message }}</span>
                    @enderror
                </div>
                 <div class="input-box flex flex-col items-start gap-3 w-full" >
                    <label for="name">Email: </label>
                    <input type="email" class="w-full  outline-none  border border-slate-300 bg-slate-100 px-3 py-2 rounded shadow" name="email" placeholder="Email" value="{{ $user->email }}" >
                     @error('email')
                        <span class="text-red-700" >{{ $message }}</span>
                    @enderror
                </div>
                 <div class="input-box flex flex-col items-start gap-3 w-full" >
                    <label for="name">New Password: </label>
                    <input type="password" class="w-full  outline-none  border border-slate-300 bg-slate-100 px-3 py-2 rounded shadow" name="password" placeholder="Enter New Password." >
                     @error('password')
                        <span class="text-red-700" >{{ $message }}</span>
                    @enderror
                </div>
                 
                <button type="submit" class="bg-pink-500 py-4 px-7 text-white font-semibold cursor-pointer hover:bg-pink-400  hover:border-pink-700 transition-all duration-500 border  rounded shadow  " >
                    Save
                </button>
            </form>
        </div>
    </section>





    <script defer >
        const profile = document.getElementById("profile");
        const preview = document.getElementById('preview');
        const closePreviewBtn = document.getElementById('closePreview');
        const defaultProfile = "{{ $user->profile_img }}";

        profile.addEventListener('change' , (event)=>{
            const file = event.target.files[0]; 
            if (file) {
                const reader = new FileReader(); 
                
                reader.onload = function(e) {
                    preview.src = e.target.result; 
                };

                reader.readAsDataURL(file); 
                closePreviewBtn.classList.remove('hidden');
            }
        })
        closePreviewBtn.addEventListener('click' , ()=>{
            preview.src = defaultProfile;
            profile.value = null;
            closePreviewBtn.classList.add('hidden')
        })




        function handleSubmit(){
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
        }
    </script>


</body>
</html>