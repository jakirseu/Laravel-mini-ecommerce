<x-layout>
    <div  class="block m-6 p-6 bg-white border border-gray-200 rounded-lg shadow ">
        <h2 class="mb-2 text-2xl font-bold"> {{ $product->title }}</h2>
        <p class="mt-6"> Product Price: ${{ $product->price }}</p>
        <p class="mt-6"> Product Id: {{ $product->id }}</p>

        <div class="flex justify-end mt-10  ">

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 60px;">
                <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800">
                    Add to Cart</button>
            </form>

        </div>
    </div>
</x-layout>
