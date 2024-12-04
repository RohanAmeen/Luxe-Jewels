<x-app-layout>
    <div class="container mt-5">
    <h1 class="text-center mb-4">Edit Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Category</button>
    </form>
</div>

</x-app-layout>