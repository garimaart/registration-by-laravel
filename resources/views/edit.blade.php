<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-300 border border-gray-500 p-6 rounded-xl">
            <h1 class="text-center font-bold txt-ml">Register</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mb-6">
                <input type="hidden" name="_token" id="csrf" value="{{ Session::token() }}">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"><br>
                <label id="nameerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email1" placeholder="Enter Email" name="email"><br>
                <label id="emailerror" style="color:red;"></label>
            </div>
            <div class="form-group mb-6">
                <label for="email">username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"><br>
                <label id="usernameerror" style="color:red;"></label>
            </div>
            <div class="form-group">
                <label for="email">password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"><br>
                <label id="passworderror" style="color:red;"></label>
            </div>
            <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
            </div>
        </main>
    </section>
</x-layout>