<x-layout>
    <div class="text-left mr-auto w-full  ">

        @foreach ($products as $product)
            <div class="block max-w-sm m-5  float-left  bg-white border border-gray-200 rounded-lg shadow ">

                @if ($product->image)
                    <a href="{{ route('product.show', $product) }}">

                        <img src="{{ asset('storage/' . $product->image) }}" class="rounded-t-lg"
                            alt="{{ $product->title }}">
                    </a>
                @endif

                <div class="p-5">

                    <a href="{{ route('product.show', $product) }}">
                        <h5 class="mb-2 text-2xl">Product name:
                            {{ $product->title }}</h5>
                    </a>

                    <p class="">Price: ${{ $product->price }}</p>
                    <p>Category: {{ $product->category ? $product->category->name : 'No Category' }}</p>

                    <form action="{{ route('cart.add') }}" method="POST" class="mt-10">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1" class="font-large"
                            style="width: 60px;">
                        <button type="submit"
                            class="inline-flex items-center  px-5 py-2.5 text-sm font-medium text-center text-white bg-green-700 rounded-lg   hover:bg-green-800">
                            Add to Cart</button>
                    </form>

                </div>
            </div>
        @endforeach

        {{ $products->links() }}

    </div>

</x-layout>
