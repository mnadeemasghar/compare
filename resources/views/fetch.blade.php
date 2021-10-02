<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="work"></div>
    <div id="total"></div>
    <div id="demo"></div>
    <ol>
        @php
        $i = 0;
        @endphp
        @foreach($data as $row)
        @php
        $i = $i + 1;
        @endphp
        <li>{{$row}} - <span id="{{$i}}"></span></li>
        @endforeach
    </ol>
    <script>
            const daraz_links = <?php echo json_encode($data); ?>;
            var i = 1 ;
            daraz_links.forEach(loadXMLDoc);

            
            function loadXMLDoc(url) {
                console.log("URL:"+url);
                document.getElementById(i).innerHTML = "<span style='color:blue;'>Collecting...</span>";
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "{{route('getdarazdata_for_fetch')}}?url="+url, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(i).innerHTML = "<span style='color:red;'>"+this.responseText+"</span>";
                        i = i + 1;
                        if(i % 4 == 0){
                            document.getElementById(i).innerHTML = "<span style='color:green;'>Pused for 10 second...</span>";
                            setTimeout(function()
                            {
                                loadXMLDoc(url);
                            }, 10000);
                        }
                    }
                };
            }
            </script>
</body>
</html>