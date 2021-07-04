<div class="card" id="product{{$p->id}}">
    <div class="card-body">
        <div>product name :{{$p->name}}</div>
        <div>product price :{{$p->price}}</div>
        <input type="hidden" name="product_id[]" value="{{$p->id}}">
        <hr>
        @foreach($taxs as $tax)
            {{$tax->name.' --> '.($tax->value * 100).'%'}}<input type="checkbox" name="tax{{$p->id}}[]" value="{{$tax->value}}"><br>
        @endforeach
    </div>
</div>
