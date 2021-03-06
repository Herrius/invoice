<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('products.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                {{ __('Add new') }}
            </a>
            @if (session('status'))
                <div class="max-w-lg mx-auto">
                    <div class="flex bg-{{ session('color') }}-100 rounded-lg p-4 mb-4 text-sm text-{{ session('color') }}-700"
                        role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
            <!-- component -->
            <div class="overflow-x-auto">

                <div
                    class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">#id</th>
                                        <th class="py-3 px-6 text-left">Product name</th>
                                        <th class="py-3 px-6 text-center">Price</th>
                                        <th class="py-3 px-6 text-center">Created at</th>
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach ($products as $product)


                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                        <img class="w-10  rounded-full"
                                                            src="{{ asset("$product->featured_image_url") }}" />
                                                    </div>
                                                    <span
                                                        class="font-medium">{{ str_pad($product->id, 6, 0, STR_PAD_LEFT) }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                        <img class="w-6 h-6 rounded-full"
                                                            src="https://randomuser.me/api/portraits/men/1.jpg" />
                                                    </div>
                                                    <span>{{ $product->name }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{ $product->price }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{ $product->created_at }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <div
                                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        {{-- edit --}}

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>

                                                    </div>
                                                    <div
                                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <a
                                                            href={{ route('products.edit', ['product' => $product->id]) }}>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                       <form method="POST" action="{{ route('products.destroy', ['product'=> $product->id]) }}">
                                                            @csrf
                                                            {{  method_field("DELETE") }}

                                                            <a href="{{ route('products.destroy', ['product'=> $product->id]) }}" onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
