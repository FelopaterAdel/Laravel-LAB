<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
        <div class="bg-white shadow-xl rounded-xl overflow-hidden w-full max-w-2xl">

            <div class="p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Post Details</h2>
            </div>

            <div class="p-6 space-y-4">

                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">ID:</span>
                    <span class="text-gray-900">{{ $post['id'] }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Title:</span>
                    <span class="text-gray-900">{{ $post['title'] }}</span>
                </div>

                <div class="flex justify-between items-start">
                    <span class="font-medium text-gray-700">Body:</span>
                    <p class="text-gray-900 text-right max-w-sm">{{ $post['body'] }}</p>
                </div>

                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">User id:</span>
                    <span class="text-gray-900">{{ $post->User->id}}</span>
                    </div>
                    <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">User name:</span>
                    <span class="text-gray-900">{{ $post->User->name}}</span>
                    </div>
                    <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">User email:</span>
                    <span class="text-gray-900">{{ $post->User->email}}</span>
                    </div>

                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Image:</span>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="rounded-lg shadow w-32 h-32 object-cover">
                    @else
                        <span class="text-gray-500">No Image</span>
                    @endif
                </div>

                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Created At:</span>
                    <span class="text-gray-900">{{ $post->created_at ? $post->created_at->format('Y-m-d') : '' }}</span>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">

                    <a href="{{ url('posts/' . $post['id'] . '/edit') }}"
                       class="inline-flex items-center gap-2 rounded border border-indigo-600 bg-indigo-600 px-4 py-2 text-white hover:bg-transparent hover:text-indigo-600 transition">
                        Edit
                    </a>

                    <form action="{{ url('posts/' . $post['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded border border-red-600 bg-red-600 px-4 py-2 text-white hover:bg-transparent hover:text-red-600 transition">
                            Delete
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
