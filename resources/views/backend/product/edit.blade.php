@extends('backend.mastaring')

@section('content')
<div class="ecogreen-category-form">

    <style>
        /* ===== EcoGreen Product Form ===== */
        .ecogreen-category-form {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 15px;
            background: #f0f7f4; /* green-soft */
        }

        .form-box {
            width: 100%;
            max-width: 900px;
            background: #ffffff;
            border-radius: 14px;
            padding: 35px 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-title {
            font-weight: 600;
            color: #1a5d42; /* green-main */
            border-left: 5px solid #52b788; /* green-accent */
            padding-left: 12px;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
            color: #062c21; /* green-dark */
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid #d9e2dd;
            padding: 10px 14px;
            transition: 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #1a5d42; /* green-main */
            box-shadow: 0 0 0 0.15rem rgba(26, 93, 66, 0.2);
        }

        textarea.form-control {
            resize: none;
            min-height: 90px;
        }

        .btn-eco {
            background: linear-gradient(135deg, #1a5d42, #062c21); /* dark → main */
            color: #ffffff;
            border: none;
            border-radius: 30px;
            padding: 10px 22px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-eco:hover {
            background: linear-gradient(135deg, #062c21, #1a5d42);
            transform: translateY(-1px);
        }

        .btn-cancel {
            border-radius: 30px;
            padding: 10px 22px;
        }

        .text-danger.small {
            margin-top: 4px;
        }

        input[type="file"] {
            padding: 8px;
        }

        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .form-box {
                padding: 25px 20px;
            }
        }
    </style>

    <div class="form-box">

        <h5 class="form-title">Edit Product</h5>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Product Name --}}
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}">
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select id="category-select" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Sub Category --}}
            <div class="mb-3">
                <label class="form-label">Sub Category</label>
                <select id="sub-category-select" name="sub_category_id" class="form-select @error('sub_category_id') is-invalid @enderror">
                    <option value="">-- Select Sub Category --</option>
                    @foreach ($sub_categories as $sub)
                        @if($sub->category_id == old('category_id', $product->category_id))
                            <option value="{{ $sub->id }}"
                                {{ old('sub_category_id', $product->sub_category_id) == $sub->id ? 'selected' : '' }}>
                                {{ $sub->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('sub_category_id') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Price & Discount --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control"
                        value="{{ old('price', $product->price) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Discount</label>
                    <input type="number" step="0.01" name="discount" class="form-control"
                        value="{{ old('discount', $product->discount) }}">
                </div>
            </div>

            {{-- Quantity --}}
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control"
                    value="{{ old('quantity', $product->quantity) }}">
            </div>

            {{-- Descriptions --}}
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control">{{ old('short_description', $product->short_description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Details</label>
                <textarea name="product_details" class="form-control">{{ old('product_details', $product->product_details) }}</textarea>
            </div>

            {{-- Policies --}}
            <div class="mb-3">
                <label class="form-label">Delivery Policy</label>
                <textarea name="delivery_policy" class="form-control">{{ old('delivery_policy', $product->delivery_policy) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Return Policy</label>
                <textarea name="return_policy" class="form-control">{{ old('return_policy', $product->return_policy) }}</textarea>
            </div>

            {{-- Images --}}
            <div class="mb-3">
                <label class="form-label">Product Images</label>
                <input type="file" name="images[]" multiple class="form-control">
                {{-- Existing Images --}}
                <div class="mt-2 d-flex flex-wrap">
                    @foreach($product->uploads as $upload)
                        <img src="{{ asset('storage/' . $upload->path) }}" class="img-preview" alt="product">
                    @endforeach
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-eco">
                    <i class="bi bi-check-circle"></i> Update Product
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-cancel">Cancel</a>
            </div>

        </form>
    </div>
</div>

{{-- AJAX Script for Subcategory --}}
@push('body-scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('category-select');
    const subCategorySelect = document.getElementById('sub-category-select');

    categorySelect.addEventListener('change', function() {
        const categoryId = this.value;

        // Clear old subcategories
        subCategorySelect.innerHTML = '<option value="">-- Select Sub Category --</option>';

        if(categoryId) {
            fetch("{{ url('/sub-categories') }}/" + categoryId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.id;
                        option.text = sub.name;
                        subCategorySelect.appendChild(option);
                    });
                })
                .catch(err => console.error('Error fetching subcategories:', err));
        }
    });
});
</script>
@endpush

@endsection
