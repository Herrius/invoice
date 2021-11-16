<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New product') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                {{ __('Product list') }}
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- component -->
            <div class="max-w-lg mx-auto">

                <form class="grid gap-8 grid-cols-1" action="{{route('products.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{old('name')}}">
                            
                    </div>
                    @error('name')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    <div class="mb-6">
                        <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Precio</label>
                        <input type="number" id="price" name="price"
                            value="{{old('price')}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required="">
                    </div>
                    @error('price')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500
                                focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input type="file" id="image" image="image"
                                    class="sr-only"
                                    required="">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG,JPG,GIF up to 10MB
                            </p>
                        </div>
                    </div>
                    @error('image')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    <div class="mb-6">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">Submit</button>
                    </div>
                    
                </form>

            </div>

            <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
        </div>
    </div>
</x-app-layout>
