<x-dashboard-layout>


    <div class="p-8" >
        <div class="text-center" >
            <a href="{{ route('vehicle.index') }}" class="text-blue-700">Back</a>
            <h2 class="text-2xl  font-semibold" >Edit The Vehicle {{ $vehicle->title }}</h2>
            <p class="text-slate-600" >Cars are not just transportation; they are an expression of who we are.</p>
        </div>
        <form action="{{ route('vehicle.update' , $vehicle->id) }}" method="post" class="my-10  max-w-[750px] mx-auto " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-zinc-800 h-[350px] rounded overflow-hidden relative " >
            <button id="closePreview" type="button"  class="absolute hidden z-999 -top-5 px-3 py-1 -right-2 bg-slate-300 rounded-full" ><i class="fa-solid fa-xmark"></i></button>
                <label for="imgUpload" class="absolute top-0 w-full h-full cursor-pointer z-10" >
                    <img id="previewImage" class="object-fit shadow w-full h-full object-center rounded-sm hover:opacity-[.5] transition " src="{{asset('storage/' . $vehicle->thumbnail)}}" alt="Placeholder Image">
                </label>
                <input class="opacity-0" type="file" value="{{ $vehicle->thumbnail }}"  name="thumbnail" accept=".jpg, .jpeg , .webp , .png" id="imgUpload"  >
            </div>
            <div class=" my-7 text-2xl font-semibold" >
            <h2>Main Information.</h2>
            </div>
            <div class="flex max-sm:flex-col gap-3 my-8 " >
                
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Vehicle Title</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" placeholder="e.g vehicle Title" value="{{ $vehicle->title }}" name="title" required >
                </div>
                <div class="w-full flex flex-col gap-1" >
                    <label for="price">Vehicle Price</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none " name="price" type="number" placeholder="e.g 500000" value="{{ $vehicle->price }}" required >
                </div>
            </div>
            <div class="flex max-sm:flex-col gap-3 my-7 " >
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Vehicle Model</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" placeholder="e.g F8 tributo" value="{{ $vehicle->modal }}" name="model" required >
                </div>
                <div class="w-full flex flex-col gap-1" >
                    <label for="price">Vehicle Make</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" placeholder="e.g Ferrari, Ford, Honda" value="{{ $vehicle->make }}" name="make" required >
                </div>
            </div>
            <div class="flex gap-3 my-7 " >
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Vehicle Year</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" value="{{ $vehicle->year }}" type="number" placeholder="e.g 2005" name="year" required >
                </div>
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Location</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow " type="text" placeholder="e.g Azua,Azua" value="{{ $vehicle->location }}" name="location" required >
                </div>
            </div>
            <div class="flex gap-3 my-7 " >
               
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Phone Number</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow " type="text" placeholder="e.g 03481133456" value="{{ $vehicle->phoneNumber }}" name="phone_number" required >
                </div>
            </div>

            <div class="my-8 text-2xl font-semibold " >
                <h2>Vehicle Details.</h2>
            </div>

            <div class="flex max-sm:flex-col gap-3 my-7 " >
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Vehicle Mileage</label>
                    <input class="border  border-slate-500 bg-white py-1 px-2 outline-none rounded shadow [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" type="number" placeholder="e.g 42000km" name="mileage" value="{{ $vehicle->mileage }}" required >
                </div>
                <div class="w-full flex flex-col gap-1" >
                    <label for="price">Manufacture By.</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" value="{{ $vehicle->manufacture_country }}" placeholder="e.g Pakistan, Englad, USA" name="manufacture_country" required >
                </div>
            </div>
            <div class="flex max-sm:flex-col gap-3 my-7 " >
                <div class="flex flex-col gap-1 w-full" >
                    <label for="price">Exterior Color</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" value="{{ $vehicle->exterior_color }}" placeholder="e.g Black" name="exterior_color" required >
                </div>
                <div class="w-full flex flex-col gap-1" >
                    <label for="price">Interior Color</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" value="{{ $vehicle->interior_color }}" placeholder="e.g Red" name="interior_color" required >
                </div>
            </div>
            <div class="flex max-sm:flex-col gap-3 my-7 " >
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Vehicle Category</label>
                    <select name="category"  id="category" class="bg-white py-2 rounded border-slate-300 px-2 shadow" value="{{ $vehicle->category }}" required >
                        <option  hidden>Select any option.</option>
                        <option value="used">Used</option>
                        <option value="new">New</option>
                    </select>
                </div>
                <div class="w-full flex flex-col gap-1" >
                    <label for="price">Engine Type</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" placeholder="e.g Gasoline" value="{{ $vehicle->engine_type }}" name="engine_type" required >
                </div>
            </div>
            <div class="flex max-sm:flex-col gap-3 my-7 " >
                <div class="flex flex-col gap-1 w-full" >
                    <label for="title">Vehicle Transmission.</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" placeholder="e.g Gasoline" name="transmission" value="{{ $vehicle->transmission }}" required >
                </div>
                <div class="w-full flex flex-col gap-1" >
                    <label for="price">Engine capacity</label>
                    <input class="border border-slate-500 bg-white py-1 px-2 outline-none rounded shadow" type="text" value="{{ $vehicle->engine_capacity }}" placeholder="e.g 4.6-L V-8 SOHC 16V" name="engine_capacity" required >
                </div>
            </div>


            <div class="text-2xl font-semibold my-9" >
                <h2>Additional Feature</h2>
            </div>
            <div id="input-container" class="flex flex-col gap-3 py-7" >

                @foreach (json_decode($vehicle->additional_feature) as $feature )
                <div class="relative" >
                        
                        <input class="w-full block p-2 outline-none border rounded border-slate-300 bg-white" type="text" placeholder="e.g Air Bags" value="{{ $feature }}" name="additional_feature[]" required>
                        <div id="del-input" class="h-[23px] w-[23px] absolute -top-3 -right-3 cursor-pointer border rounded-full bg-slate-300 flex justify-center items-center "  >
                        <i class="fa-solid fa-xmark"></i>
                        </div>
                    
                    
                </div>
                @endforeach
            </div>
            <div id="add_input" class="bg-white rounded py-2 text-center text-2xl hover:opacity-[0.6] cursor-pointer w-full" >
                <i class="fa-solid fa-plus"></i>
            </div>

            <div class="my-8" >
                <h2 class="text-2xl font-semibold" >Vehicle Overview.</h2>
                <textarea required placeholder="e.g description of the vehicle" class="bg-white rounded outline-none mt-7 w-full p-3"  name="description" id="description" maxlength="200" >
                    {{ $vehicle->description }}
                </textarea>
            </div>

            <button class="bg-pink-700 cursor-pointer hover:bg-pink-500 transition all py-3 w-full text-center text-white my-7 rounded" type="submit" >Publish Vehicle</button>
        </form>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const input_container = document.getElementById('input-container');
        const add_input = document.getElementById('add_input');
        const del_input = document.getElementById('del-input');

        add_input.addEventListener('click', addInput);


        function addInput() {
            const container = document.getElementById('input-container');

            // Create a wrapper div for the input and delete button
            const div = document.createElement('div');
            div.classList.add('relative');

            // Create the input element
            const input = document.createElement('input');
            input.setAttribute('required','true')
            input.type = 'text';
            input.placeholder = 'e.g Air Bags';
            input.name = 'additional_feature[]';
            input.classList.add('w-full', 'block', 'p-2', 'outline-none', 'border', 'rounded', 'border-slate-300', 'bg-white');

            // Create the delete button
            const button = document.createElement('div');
            button.classList.add('absolute', '-right-2', '-top-3', 'h-[23px]', 'bg-slate-300', 'cursor-pointer', 'w-[23px]', 'flex', 'items-center', 'justify-center', 'border', 'rounded-full');

            button.innerHTML = '<i class="fa-solid fa-xmark"></i>';
            button.addEventListener('click',function() {
                div.remove();  
            }); 

        // Append the input and delete button to the wrapper div
        div.appendChild(input);
        div.appendChild(button);

        // Append the wrapper div to the container
        container.appendChild(div);
    }


        del_input.addEventListener('click' , (e)=>{
            const parentEl = e.target.closest('.relative');
            parentEl.remove();
        })

        const uploadImg = document.getElementById('imgUpload')
        uploadImg.addEventListener('change', function(event) {
            const file = event.target.files[0]; 
            if (file) {
                const reader = new FileReader(); 

                
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result; 
                };

                reader.readAsDataURL(file); 
            }
            document.getElementById('closePreview').classList.remove('hidden')
        });
        const close_btn = document.getElementById('closePreview');
        close_btn.addEventListener('click' , (e)=>{
            previewImage.src = '{{ asset('blogbanner.png') }}'
            uploadImg.value = null;
            close_btn.classList.add('hidden');
        })




           
        });
    </script>


</x-dashboard-layout>