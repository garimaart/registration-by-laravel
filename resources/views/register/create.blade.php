<x-layout>
   <section class="px-6 py-8">
      <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
         <h1 class="text-center font-bold txt-ml">Register</h1>
         <form method="POST" action="/register" class="mt-10">
            @csrf
            <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="name">
                  Nmae
               </label>
               <input class="border border-gray-400 ps-2 w-fall"
               type="text"
               name="name"
               id="name"
               required
               >
               @error('name')
               <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                           
                       @enderror
            </div>
            <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="username">
                  username
               </label>
               <input class="border border-gray-400 ps-2 w-fall"
               type="text"
               name="username"
               id="username"
               required
               >
               @error('username')
               <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                           
                       @enderror
            </div>
            <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="email">
               </label>
               <input class="border border-gray-400 ps-2 w-fall"
               type="email"
               name="email"
               id="email"
               required
               >
               @error('email')
               <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                           
                       @enderror
            </div>

            <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="password">
                  Password
               </label>
               <input class="border border-gray-400 ps-2 w-fall"
               type='password'              
               name="password"
               id="password"
               required
               >
               @error('password')
               <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                           
                       @enderror
            </div>
            <div class="mb-6">
               <button type="submit"
               class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                  submit
               </button>
            </div>
         </form>
      </main>
   </section>
</x-layout>