


<x-app-layout>
<title>posts</title>

   
<div class="overflow-x-hidden">
  <table class="min-w-full divide-y-2 divide-gray-200">
    <thead class="ltr:text-left rtl:text-right">
      <tr class="*:font-medium *:text-gray-900">
        <th class="px-3 py-2 whitespace-nowrap">id</th>
        <th class="px-3 py-2 whitespace-nowrap">title</th>
        <th class="px-3 py-2 whitespace-nowrap max-w-[200px] truncate">body</th>
        <th class="px-3 py-2 whitespace-nowrap">user id</th>
        <th class="px-3 py-2 whitespace-nowrap">image</th>
        <th class="px-3 py-2 whitespace-nowrap">created at</th>

        <th class="px-3 py-2 whitespace-nowrap">view</th>
        <th class="px-3 py-2 whitespace-nowrap">edit</th>
        <th class="px-3 py-2 whitespace-nowrap">delete</th>



      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 *:even:bg-gray-50">
    @foreach($posts as $post)
      <tr class="*:text-gray-900 *:first:font-medium">
        <td class="px-3 py-2 whitespace-nowrap">{{ $post['id'] }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $post['title'] }}</td>
        <td class="px-3 py-2 whitespace-nowrap max-w-[200px] truncate">{{ $post['body'] }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $post['user_id'] }}</td>
        <td class="px-3 py-2 whitespace-nowrap"> @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" width="100">
    @else
        No Image
    @endif</td>
    <td class="px-3 py-2 whitespace-nowrap">{{  $post->created_at ? $post->created_at->format('Y-m-d') : ''}}</td>
    <td class="px-3 py-2 whitespace-nowrap"><a   class="group flex items-center justify-between gap-4 rounded-lg border border-indigo-600 bg-indigo-600 px-5 py-3 transition-colors hover:bg-transparent focus:ring-3 focus:outline-hidden"
    href="{{ url('posts/' . $post['id']) }}">view</a></td>
    <td class="px-3 py-2 whitespace-nowrap"><a   class="inline-block rounded-sm border border-current px-8 py-3 text-sm font-medium text-indigo-600 transition hover:scale-110 hover:rotate-2 focus:ring-3 focus:outline-hidden"
    href="{{ url('posts/' . $post['id'] . '/edit') }}">edit</a></td>

    <td class="px-3 py-2 whitespace-nowrap"><form action="{{ url('posts/' . $post['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"     class="block border border-red-600 bg-red-600 px-12 py-3 transition-transform group-hover:-translate-x-1 group-hover:-translate-y-1"
            >Delete</button>
        </form>
    </td>

      </tr>
      @endforeach

         </tbody>
  </table>
</div>
<div class="flex flex-row justify-center mt-4">
    {{ $posts->links() }}
</div>


</x-app-layout>
