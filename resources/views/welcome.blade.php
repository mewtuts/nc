<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nested Categories</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- @forelse ($files as $category)
        @foreach ($category->getFiles as $file)
        <p>{{ $file->file_name }}</p>
    @empty
        
    @endforelse
        @endforeach --}}
    @foreach ($categories as $category)  
        
        <x-category-item :category="$category" />
      
    @endforeach

<div class="flex">
    <div class="uppercase font-bold italic border-2 border-black m-2 p-4 w-96">
        <h2 class="text-center mb-4">Create Sub Parent</h2>
        <form class="grid border border-black p-2" action="{{ route('create_sub_category') }}" method="POST">@csrf
            <input class="border border-black p-2" type="text" name="sub_category_name" placeholder="Folder name">
            <div class="grid w-32 my-2">
                <label for="select_parent_folder">Select parent folder</label>
                <select class="border border-black my-2" name="parent_category_id" id="">
                    
                    @foreach ($categories as $category)
                       
                            <x-select-options :category="$category" />

                    @endforeach

                </select>
            </div>
            <input class="border border-black p-2" type="submit" name="create">
        </form>
    </div>

    <div class="uppercase font-bold italic border-2 border-black m-2 p-4 w-96">
        <h2 class="text-center mb-4">Upload file</h2>
        <form class="grid border border-black p-2" action="{{ route('upload_file') }}" method="POST" enctype="multipart/form-data">@csrf
            <input class="border border-black p-2" type="file" name="file" placeholder="file">
            <div class="grid w-32 my-2">
                <label for="select_parent_folder">Select parent folder</label>
                <select class="border border-black my-2" name="parent_category_id" id="">
                    
                    @foreach ($categories as $category)
                        <x-select-options :category="$category" />
                    @endforeach

                </select>
            </div>
            <input class="border border-black p-2" type="submit" name="create">
        </form>
    </div>
</div>

</body>
</html>