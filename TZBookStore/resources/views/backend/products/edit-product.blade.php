@extends('layouts.backend')
@section('content')
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                    </div>
                </div>
                <form action="{{ route('admin.products.update', $product->book_id) }}" 
                      method="POST" 
                      class="tm-edit-product-form"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group mb-3">
                                <label for="title">Product Name</label>
                                <input id="title" 
                                       name="title" 
                                       type="text" 
                                       value="{{ old('title', $product->title) }}"
                                       class="form-control validate @error('title') is-invalid @enderror"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="author">Author</label>
                                <input id="author" 
                                       name="author" 
                                       type="text"
                                       value="{{ old('author', $product->author) }}"
                                       class="form-control validate @error('author') is-invalid @enderror"
                                       required>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="publisher">Publisher</label>
                                <input id="publisher" 
                                       name="publisher" 
                                       type="text"
                                       value="{{ old('publisher', $product->publisher) }}"
                                       class="form-control validate">
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" 
                                          name="description" 
                                          class="form-control validate" 
                                          rows="5">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="custom-select tm-select-accounts" 
                                        id="category"
                                        name="category_id"
                                        required>
                                    <option value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}" 
                                                {{ old('category_id', $product->category_id) == $category->category_id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="price">Price (VNĐ)</label>
                                    <input id="price" 
                                           name="price" 
                                           type="number"
                                           value="{{ old('price', $product->price) }}"
                                           class="form-control validate @error('price') is-invalid @enderror"
                                           required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="stock">Units In Stock</label>
                                    <input id="stock" 
                                           name="stock_quantity" 
                                           type="number"
                                           value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                           class="form-control validate @error('stock_quantity') is-invalid @enderror"
                                           required>
                                    @error('stock_quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="published_date">Published Date</label>
                                <input id="published_date" 
                                       name="published_date" 
                                       type="date"
                                       value="{{ old('published_date', $product->published_date) }}"
                                       class="form-control validate">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-edit mx-auto">
                                <img id="preview" 
                                     src="{{ $product->image_url ?? asset('frontend/img/product-default.jpg') }}"
                                     alt="Product image" 
                                     class="img-fluid d-block mx-auto">
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="image_url">Image URL</label>
                                <input id="image_url" 
                                       name="image_url" 
                                       type="text"
                                       value="{{ old('image_url', $product->image_url) }}"
                                       class="form-control validate"
                                       placeholder="Paste image URL here">
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                Update Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview image when URL changes
    document.getElementById('image_url').addEventListener('change', function() {
        let preview = document.getElementById('preview');
        let url = this.value || '{{ asset('frontend/img/product-default.jpg') }}';
        
        // Kiểm tra URL hợp lệ
        let img = new Image();
        img.onload = function() {
            preview.src = url;
        };
        img.onerror = function() {
            alert('URL ảnh không hợp lệ!');
            preview.src = '{{ asset('frontend/img/product-default.jpg') }}';
        };
        img.src = url;
    });

    // Xác nhận trước khi submit
    document.querySelector('.tm-edit-product-form').addEventListener('submit', function(e) {
        if (!confirm('Bạn có chắc muốn cập nhật sản phẩm này?')) {
            e.preventDefault();
        }
    });
</script>
@endpush
@endsection