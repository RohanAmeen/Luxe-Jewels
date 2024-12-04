<x-app-layout>
    <div class="container">
        <h1>Add New Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add Category</button>
        </form>
    </div>
</x-app-layout>