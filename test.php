<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Date and Time Picker Example</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <!-- jQuery Timepicker Addon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.0/jquery.timepicker.min.css" integrity="sha512-wlq3zFYkFJpXnb4v4A4p4KUJ10C4sB6xv2Sxum+8RLGhLXb/VyMDvQJH7DN/GvtJzGZcY+JrSErV7LmGm/ZuEg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.0/jquery.timepicker.min.js" integrity="sha512-vQYMD3qZh+pcpxmAHXcQT/rO9LJWmp4ev4vM6UzWWBb/ty6WTEfg8TQxLyRGJ/l1+m0NkV7n8a2zEdV7Jg+1eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(function() {
            // Datepicker
            $("#datepicker").datepicker({
                dateFormat: "DD d MM yy"
            });
        });
    </script>
</head>

<body>
    <label for="datepicker">Select a date:</label>
    <input type="text" id="datepicker">
</body>

</html>