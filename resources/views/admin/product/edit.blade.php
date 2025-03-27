<x-app-layout>


    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <h4 class="pt-3 pb-3 text-primary">Dashboard</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Edit Products</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div>
                                <img style="max-width: 100px;" src="{{ asset($product->image) }}">
                            </div>
                            <label for="" class="mt-2 mb-2">Image</label>
                            <x-text-input type="file" class="form-control" name="image" />
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-2 mb-2">Images</label>
                            <x-text-input type="file" class="form-control" name="images[]" multiple />
                        </div>
                        <div class="form-group">
                            @foreach ($product->images as $image)

                            <div>
                                <img style="max-width: 100px;" src="{{ asset($image->path) }}">
                            </div>
                            @endforeach
                            <label for="" class="mt-2 mb-2">Name</label>
                            <x-text-input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
                            <div class="form-group mt-2 mb-2">
                                <label for="">Price</label>
                                <x-text-input type="text" class="form-control" name="price" value="{{ $product->price }}" />
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <label for="">Colors</label>
                                <x-select-input name="colors[]" multiple>
                                    <option value="">Select</option>
                                    <option @selected($product->colors->contains('name', 'black')) value="black">Black</option>
                                    <option @selected($product->colors->contains('name', 'green')) value="green">Green</option>
                                    <option @selected($product->colors->contains('name', 'red')) value="red">Red</option>
                                    <option @selected($product->colors->contains('name', 'cyan')) value="cyan">Cyan</option>
                                </x-select-input>
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <label for="">Short Description</label>
                                <x-text-input type="text" class="form-control" name="short_description" value="{{ $product->short_discription }}" />
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <label for="">Qty</label>
                                <x-text-input type="text" class="form-control" name="qty" value="{{ $product->qty }}" />
                            </div>
                            <div class="form-group" class="mt-2 mb-2">
                                <label for="">Sku</label>
                                <x-text-input type="text" class="form-control" name="sku" value="{{ $product->sku }}" />
                            </div>
                            <div class="form-group" class="mt-2 mb-2">
                                <label for="">Description</label>
                                <textarea name="description" id="editor" cols="30" rows="10">{{ $product->description }}</textarea>
                            </div>
                            <x-primary-button>Submit</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script>
            tinymce.init({
                selector: 'textarea#editor',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
    </x-slot>

</x-app-layout>
