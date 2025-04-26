<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

            <h2 class="text-2xl font-semibold text-center mb-6">Add New Post</h2>

            <form class="space-y-4" action="/posts" method="POST" enctype="multipart/form-data">
                @csrf 

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700" for="title">Title</label>
                    <input type="text" class="form-control block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="title" id="title">
                </div>

                <div>
                    <label for="body" class="block mb-1 text-sm font-medium text-gray-700">Body</label>
                    <textarea name="body" id="body" rows="4" class="form-control block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500"></textarea>
                </div>

                <div>
                    <label for="Image" class="block mb-1 text-sm font-medium text-gray-700">Upload Image</label>
                    <input type="file" class="form-control block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none" name="image">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-200">
                    Add Post
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
