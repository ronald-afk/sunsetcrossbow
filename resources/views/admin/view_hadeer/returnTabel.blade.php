

<table>
    <thead>
        <tr>
        <th><b>No</b></th>  
        <th><b>Item</b></th>  
        <th><b>Qty</b></th>   
        <th><b>Alasan</b></th>   
        </tr>
    </thead>
    <tbody>
    @foreach ($return as $item)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->item->name}}</td>
        <td>{{$item->qtt}}</td>
        <td>{{$item->alasan}}</td>
    </tr>
    @endforeach
</tbody>
</table>