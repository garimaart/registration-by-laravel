<x-layout>
    <section class="px-6 py-8">
       <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
          <h1 class="text-center font-bold txt-ml">Posts</h1>
          <form method="POST" action="/posts" class="mt-10">
             @csrf
             <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="category_id">
                   category_id
                </label>
                <input class="border border-gray-400 ps-2 w-fall"
                type="number"
                name="category_id"
                id="category_id"
                required
               >
               @error('category_id')
               <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                           
                       @enderror
             </div>
             <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="user_id">
                  user id
               </label>
               <input class="border border-gray-400 ps-2 w-fall"
               type="number"
               name="user_id"
               id="user_id"
               required
              >
              @error('user_id')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          
                      @enderror
            </div>
             <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="slug">
                  slug
               </label>
               <input class="border border-gray-400 ps-2 w-fall"
               type="slug"
               name="slug"
               id="slug"
               required
              >
              @error('slug')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  
              @enderror
            </div>
             <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="title">
                   title
                </label>
                <input class="border border-gray-400 ps-2 w-fall"
                type="text"
                name="title"
                id="title"
                required
                >
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            
                        @enderror
             </div>
             <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="excerpt">
                   excerpt
                </label>
                <textarea class="border border-gray-400 ps-2 w-fall"
                type="text"
                name="excerpt"
                id="excerpt"
                required
                >
                </textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            
                        @enderror
             </div>
 
             <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="body">
                   body
                </label>
                <textarea class="border border-gray-400 ps-2 w-fall"
                type='text'              
                name="body"
                id="body"
                required
                >
                </textarea>
                @error('body')
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