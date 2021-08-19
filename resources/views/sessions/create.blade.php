<x-layout>
    <section class="px-6 py-8">
       <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
          <h1 class="text-center font-bold txt-ml">login</h1>
          <form method="POST" action="/login" class="mt-10">
             @csrf
             <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="email">
                    email
                </label>
                <input class="border border-gray-400 ps-2 w-fall"
                type="email"
                name="email"
                id="email1"
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
                   login
                </button>
             </div>
          </form>
       </main>
    </section>
 </x-layout>