<x-layout>
<table class="table table-bordered table-sm" style="width=100%; cellspacing=0; cellpadding=2; border=2;">

  <thead>
   <tr>
       <th>No</th>
       <th>user id</th>
       <th>category id</th>
       <th>Slug</th>
        <th>title</th>
        <th>Body</th>
       <th width="280px">Action</th>
   </tr>
  </thead>
  <tbody id="bodyData">

  </tbody>  
</table>
 <script>
$(document).ready(function() {
        $.ajax({
            url: "/list",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                    bodyData+="<tr>"
                    bodyData+="<td>"+row.id++ +"</td><td>"+row.user_id+"</td><td>"+row.category_id+"</td><td>"+row.slug+"</td>"
                    +"<td>"+row.title+"</td><td>"+row.body+"</td><td>"+row.excerpt+"</td>";
                    bodyData+="</tr>";
                    
                })
                $("#bodyData").append(bodyData);
            }
        });

});
</script>
</x-layout>