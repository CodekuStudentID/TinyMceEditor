<!DOCTYPE html>
<html>
<head>
    <title>TinyMCE + Laravel</title>
    <script src="https://cdn.tiny.cloud/1/{{ config('tinymce.api_key') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'lists link image preview code',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code preview',
        });
    </script>
</head>
<body>
    <form method="POST" action="{{ route('editor.store') }}">
        @csrf
        <textarea id="editor" name="text_content"></textarea>
        <br>
        <button style="width: 120px; height: 35px; background-color: rgba(19, 156, 230, 0.778); color: white; border: none; cursor: pointer;" type="submit">Simpan Konten</button>
    </form>

    @foreach ($post as $index => $posts)
    <div style="color: black">
        <ul style="display: flex; justify-content: center; align-items: center">
            <li>{{ $index+1 }}</li>
            <p>{!! $posts->text_content !!}</p>
        </ul>
    </div>
    @endforeach
</body>
</html>
