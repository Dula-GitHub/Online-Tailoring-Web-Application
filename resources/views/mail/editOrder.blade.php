<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <p><b>Dear Sir/ Madam, </b></p>
        <p>Your order has been approved with some changes. If you are okay with the changes please confirm by following the given link.</p>
        <p>Please check the following details for the changes</p>
        <a href="{{ env('APP_URL', '')  }}/order/{{ $id }}">{{ env('APP_URL', '')  }}/order/{{ $id }}</a>
        <p>Category: {{ $category }}</p>
        <p>Sub Category: {{ $sub_category }}</p>
        <p>Material: {{ $material }}</p>
        <p>Requested Date: {{ $all['requested_date'] }}</p>
        <p>Cost: Rs. {{ $cost }}</p>
        <p>Thank you for ordering with Online Tailoring</p>
        <p><b>Online Tailoring</b></p>
    </body>
</html>