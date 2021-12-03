<html>

<body>
    <h1>Factura # {{$invoice->id}}</h1>
    <p>Muchas gracias por su compra {{$invoice->buyer->name}}</p>
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">#Id</th>
                <th class="py-3 px-6 text-left">Product</th>
                <th class="py-3 px-6 text-center">Price</th>
                <th class="py-3 px-6 text-center">Quantity</th>
                <th class="py-3 px-6 text-center">Total</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @php
                $total = 0;
            @endphp
            @foreach ($details as $item)

                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ str_pad($item->id, 4, 0, STR_PAD_LEFT) }}</span>
                        </div>
                    </td>

                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span>{{ $item->product->name }}</span>
                        </div>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <span>{{ $item->price }}</span>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <span>{{ $item->quantity }}</span>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <span>{{ $item->total_product }}</span>
                    </td>

                </tr>

                @php
                    $total = $total + $item->total_product;
                @endphp
            @endforeach
            <tr>
                <td colspan="4" class="py-3 px-6 text-left whitespace-nowrap">
                    Total Invoice
                </td>
                <td class="py-3 px-6 text-center whitespace-nowrap">
                    {{ $total }}
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
