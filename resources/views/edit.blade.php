<x-layout>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
       
    </div>
</div>

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

{{-- <form action="{{ route('userData.update',$userData->id) }}" method="POST"> --}}
    {{-- {{ csrf_field() }}
    {{ method_field('PATCH') }} --}}

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" id="slug" name="slug" value="{{ $post->slug }}" class="form-control" placeholder="slug">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
                <input type="text" class="form-control" id="title" name="title" value ="{{ $post->title }}" placeholder="title">
            </div>
        </div>
        <!-- phone -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>body:</strong>
                <textarea type="text" class="form-control" id ="body" name="body" value ="{{ $post->body }}" placeholder="body"></textarea>
            </div>
        </div>
        <!-- city-->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>excerpt:</strong>
                <textarea type="text" class="form-control" id = "excerpt" name="excerpt" value ="{{ $post->excerpt }}" placeholder="excerpt"></textarea>
            </div>
        </div>

        <!-- -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button class="btn btn-primary" id="post_data" value="{{ $post->id }}">Submit</button>
        </div>
    </div>

{{-- </form> --}}
<script>
    $(document).ready(function(){

$(document).on("click", "#post_data", function() { 
    var url = "{{URL('posts/'.$post->id)}}";
    var id= 
    $.ajax({
        url: url,
        type: "PATCH",
        cache: false,
        data:{
            _token:'{{ csrf_token() }}',
            type: 3,
            name: $('#slug').val(),
            email: $('#body').val(),
            phone: $('#title').val(),
            city: $('#excerpt').val()
        },
        success: function(dataResult){
            dataResult = JSON.parse(dataResult);
         if(dataResult.statusCode)
         {
            window.location = "/list";
         }
         else{
             alert("Internal Server Error");
         }
            
        }
    });
}); 
});

</script>
</x-layout>
 