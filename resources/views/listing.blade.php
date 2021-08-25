<x-layout>
    <table class="table table-hover">

        <thead style=" border: 1px solid black;">
    
          <th>id</th>
    
          <th>Name</th>
    
          <th>username</th>
          <th>email</th>
          <th>Created at</th>
          <th>Updated at</th>
    
        </thead>
    
        <tbody style=" border: 1px solid black;">
    @foreach($users as $user)
    
            <tr>
    
              <td style=" border: 1px solid black;">{{$user->id}} </td>
    
              <td style=" border: 1px solid black;">{{$user->name}} </td>
    
              <td style=" border: 1px solid black;">{{$user->username}} </td>
    
              <td style=" border: 1px solid black;">{{$user->email}} </td>
    
              <td style=" border: 1px solid black;">{{$user->created_at}} </td>
    
              <td style=" border: 1px solid black;">{{$user->updated_at}} </td>
    
    
            </tr>
    @endforeach
    
        </tbody>
    
    </table>
</x-layout>