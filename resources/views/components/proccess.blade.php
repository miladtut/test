<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">tax value</th>
        <th scope="col">price after tax</th>
    </tr>
    </thead>
    <tbody>
    @foreach($res as $item)
        <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item['product_name']}}</td>
            <td>{{$item['product_price']}}</td>
            <td>{{$item['sum_of_taxs']}}</td>
            <td>{{$item['product_price_after_tax']}}</td>
        </tr>
    @endforeach
        <tfooter>
            <tr>
                <td>total price after tax = {{$res->sum('product_price_after_tax')}}</td>
                <td>total price before tax = {{$res->sum('product_price')}}</td>
            </tr>
        </tfooter>
    </tbody>
</table>
