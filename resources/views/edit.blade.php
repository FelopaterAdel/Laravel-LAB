<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

            <h2 class="text-2xl font-semibold text-center mb-6">Edit Post</h2>

            <form action="{{ url('posts/' . $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @method('PUT')
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700" for="id">ID</label>
                    <input type="text" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed" value="{{ $post->id }}" readonly>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ $post->title }}">
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Body</label>
                    <input type="text" name="body" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ $post->body }}">
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">Created At</label>
                    <input type="text" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed" value="{{ $post->created_at }}" readonly>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700" for="image">Upload Image</label>
                    <input type="file" name="image" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-200">
                    Update Post
                </button>
            </form>

            @if($errors->any())
                <ul class="mt-4 text-sm text-red-600 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
</x-app-layout>
