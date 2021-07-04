@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <button class="add" id="add{{$product->id}}" data-href="{{route('get_product',$product->id)}}">add</button>
                                <button class="remove" data-id="{{$product->id}}">remove</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form id="myForm" method="post">
                    @csrf
                    <div id="container">

                    </div>
                    <input type="submit" value="submit" class="btn btn-success" id="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('.add').click(function() {
            var url = $(this).data('href')
            $.get(url,function (data) {
                $('#container').append(data)
            })
            $(this).hide()
            $('#submit').show()
        });
        $('.remove').click(function() {
            var id = $(this).data('id')
            $('#product'+id).remove()
            $('#add'+id).show()
        });

        $('#submit').click( function(e) {
            $.ajax({
                url: "{{route('proccess')}}",
                type: 'post',
                data: $('form#myForm').serialize(),
                success: function(data) {
                    $('#mbody').html(data)
                    $('#myModal').modal('show')
                }
            });
            e.preventDefault();
        });

    </script>
@stop
