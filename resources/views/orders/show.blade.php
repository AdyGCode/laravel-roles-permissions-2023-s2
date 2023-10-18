<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- table.table>(thead>tr>th{Heading}*5)+(tbody>tr>td{Item}*5)+(tfoot>tr>td{navigation}) --}}

                    <table class="table w-full">
                        <caption class="text-right mb-2 ">
                            New Order
                        </caption>
                        <thead>
                        <tr class="">
                            <th>Name</th>
                            <th>Products</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd:bg-gray-100">
                            <td>{{ $order->name }}</td>
                            <td class="flex flex-col gap-2">
                                @if(!empty($order->products))
                                    @foreach($order->products as $product)
                                        <p class="text-gray-500 p-1 text-sm">
                                            {{ $product->name }} [
                                            {{ $product->pivot->quantity }} at
                                            ${{ $product->pivot->sale_price/100 }}
                                            ]
                                        </p>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $order->notes }}</td>
                            <td>{{ $order->getTotal() }}</td>

                            <td>
                                <form action="{{ route('orders.destroy', $order) }}"
                                      class="flex flex-row gap-2 ml-4" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('orders.show', $order) }}"
                                       class="rounded bg-green-500 text-white p-2">Show</a>
                                    <a href="{{ route('orders.edit', $order) }}"
                                       class="rounded bg-blue-500 text-white p-2">Edit</a>
                                    <button type="submit" class="rounded bg-red-500 text-white p-2">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                Navigation to do
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
