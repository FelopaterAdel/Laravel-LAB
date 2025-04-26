<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    <title>{{$title ?? "Home"}}</title>
</head>
<body>
@if(session('success'))
    <div class="fixed top-4 right-4 bg-green-500 text-white px-4 py-3 rounded shadow-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="fixed top-4 right-4 bg-red-500 text-white px-4 py-3 rounded shadow-lg">
        {{ session('error') }}
    </div>
@endif

<div style="padding: 50px;" class="mb-3 mt-3" >
    <div>
     <a href="posts/create"   class="inline-block rounded-sm border border-current px-8 py-3 text-sm font-medium text-indigo-600 transition hover:scale-110 hover:rotate-2 focus:ring-3 focus:outline-hidden"
     >ADD</a>
     <a href="/posts"   class="inline-block rounded-sm border border-current px-8 py-3 text-sm font-medium text-indigo-600 transition hover:scale-110 hover:rotate-2 focus:ring-3 focus:outline-hidden"
     >all posts</a>
     <a href="/restore"   class="inline-block rounded-sm border border-current px-8 py-3 text-sm font-medium text-indigo-600 transition hover:scale-110 hover:rotate-2 focus:ring-3 focus:outline-hidden"
     >Trash</a>
    </div>
{{$slot}}

</div>
</body>
</html>