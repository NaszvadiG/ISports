

</<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<label id="out"></label>
<script src="/js/plugin/jquery.min.js"></script>
<script type="text/javascript">
    $.post("/api/sport",
        {
            userid: "4",
            distance: 5,
            date: "2016-12-02",
            time: 2,
            speed: 2.5
        },
        function (data,status) {
            $("#out").text(data);
        }
    )

</script>
</body>
</html>