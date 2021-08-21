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
                <button type="submit" id="login"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                   login
                </button>
             </div>
          </form>
          <script>
            $(document).ready(function() {
               
                $('#login').on('click', function() {
                  var email = $('#email1').val();
                  var password = $('#password').val();
                  if(email!=""&&password!=""){
                    /*  $("#butsave").attr("disabled", "disabled"); */
                      $.ajax({
                          url: "/SessionController",
                          type: "POST",
                          data: {
                              type: 1,
                              email: email,
                              password:password,
                          },
                          cache: false,
                          success: function(dataResult){
                              console.log(dataResult);
                              var dataResult = JSON.parse(dataResult);
                              if(dataResult.statusCode==200){
                                window.location.href = "/";				
                              }
                              else if(dataResult.statusCode==201){
                                 alert("Error occured !");
                              }
                              
                          }
                      });
                  }
                  else{
                      alert('Please fill all the field !');
                  }
              });
            });
            </script>
       </main>
    </section>
 </x-layout>