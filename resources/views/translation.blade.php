<html>

<head>
    <meta charset='utf-8' />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">翻訳アプリ</a>
            </div>
        </nav>
    </header>

    <div class="container">

        {{-- フォーム --}}
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label for="sentence" class="form-label">翻訳(日本語):</label>
                <textarea rows="10" name="sentence" class="form-control" required
                    id="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">翻訳</button>            
        </form>

        {{-- 翻訳結果 --}}
        @isset($translated_text)
            <div class="alert alert-primary mt-3" role="alert">
                {{ $translated_text }}
            </div>
        @endisset

    </div>
</body>

</html>