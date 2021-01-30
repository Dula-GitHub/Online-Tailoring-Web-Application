<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <p><b>Dear Sir/ Madam, </b></p>
        <p>Your order placed successfully. Your reference number is {{ $id }}.</p>
        <p>Category: {{ $category }}</p>
        <p>Sub Category: {{ $sub_category }}</p>
        <p>Material: {{ $material }}</p>
        <p>Requested Date: {{ $all['requested_date'] }}</p>
        <p>Cost: Rs. {{ $all['cost'] }}</p>
        <h3>Measurements given</h3>
        @foreach($all as $key => $one)
            @if($key != '_token' && $key != 'category_id' && $key != 'sub_category_id' && $key != 'user_id' && $key != 'material_id' && $key != 'requested_date' && $key != 'amount_of_cloth' && $key != 'cost')
                <p>{{ $key }} : {{ $one }}"</p>
            @endif
        @endforeach
        <p>Thank you for ordering with Online Tailoring</p>
        <p><b>Online Tailoring</b></p>
    </body>
</html>