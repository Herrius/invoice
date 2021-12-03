<x-guest-layout>

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <!-- component -->
        <div class="flex-col justify-center content-center text-center">
            <h1 class="tittle text-3xl font-semibold">Ingrese su codigo ID para ver su factura</h1>
            <form class="m-4 flex justify-center" action="" method="POST">
                <input class="rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white"
                    placeholder="0001" name="invoices"/>
                <button type="submit"
                    class="px-8 rounded-r-lg bg-yellow-400  text-gray-800 font-bold p-4 uppercase border-yellow-500 border-t border-b border-r">Subscribe</button>
            </form>
        </div>
        
        {{-- @isset($invoices)
            <div class="overflow-x-auto">
                <div
                    class="min-w-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">#Id</th>
                                        <th class="py-3 px-6 text-left">Serie</th>
                                        <th class="py-3 px-6 text-center">Buyer</th>
                                        <th class="py-3 px-6 text-center">Status</th>
                                        <th class="py-3 px-6 text-center">Created at</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">

                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span
                                                    class="font-medium">{{ str_pad($invoices->id, 4, 0, STR_PAD_LEFT) }}</span>
                                            </div>
                                        </td>

                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <span>{{ $invoices->serie }}</span>
                                            </div>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <span>{{ $invoices->buyer->name }}</span>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <span>{{ $invoices->status }}</span>
                                        </td>

                                        <td class="py-3 px-6 text-center">
                                            <span>{{ $invoices->created_at }}</span>
                                        </td>


                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endisset --}}
    </div>
</x-guest-layout>
