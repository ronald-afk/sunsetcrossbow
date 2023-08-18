

                        <table>
                            <thead>
                                <tr>
                                <th><b>No</b></th>  
                                <th><b>Category</b></th>   
                                <th><b>Item</b></th>
                                <th><b>Stock</b></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($stock as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->category->name}}</td>  
                                <td>{{$item->name}}</td>
                                <td>{{$item->stock}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
 

