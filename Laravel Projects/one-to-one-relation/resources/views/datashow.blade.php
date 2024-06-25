
<table border="1px">
    @foreach ($stu as $st )
<tr>
    <th>ID:{{$st->id}}</th>
    <th>Name:{{$st->name}}</th>
    <th>Age: {{$st->age}}</th>
    <th>Gender: {{$st->gender}}</th>
    <th>id: {{$st->contact->id}}</th>
</tr>
@endforeach
</table>
   
