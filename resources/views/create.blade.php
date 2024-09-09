<x-layout>
    <div class="w-full bg-slate-50 px-5 py-5">
        <form class="space-y-5" action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            <h3>Add new product</h3>

            <input type="text" id="title" name="title" value="{{ old('title') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Product Title">
                @error('title')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
                @enderror

                <input   type="text" inputmode="numeric" id="price" name="price" value="{{ old('price') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Product Price">
                @error('price')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" name="image" class="form-control" accept="image/*" value="{{ old('image') }}">
                </div>
                @error('image')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{ $message }}</div>
                @enderror


            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                Save product
            </button>
        </form>
    </div>
</x-layout>
