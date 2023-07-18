<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function start() {  
            Push.create("Hello world!", {
                body: "How's it hangin'?",
                icon: '{{ asset('t-2.jpg') }}',
                timeout: 4000,
                onClick: function () {
                    window.focus();
                    this.close();
                }
            });
        }
    </script>
    <button onclick="start()">Push</button>
</body>
</html>
