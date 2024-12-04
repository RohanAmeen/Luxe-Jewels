<x-app-layout>
    <div class="container mt-2">
    <h1>Categories</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Add New Category</a>
    <table class="table">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th> <!-- Added actions column -->
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-app-layout>
