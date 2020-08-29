<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <h1>Hello World</h1>
     @error('msg')
          <p>{{ $message }}</p>
     @enderror
     @error('msg2')
          <p>{{ $message }}</p>
     @enderror
     <form action="/hello" method="POST">
          @csrf
          <input type="text" name="msg">
          <input type="text" name="msg2">
          <input type="submit">
     </form>
</body>
</html>