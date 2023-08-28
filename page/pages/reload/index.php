<Html>
<Body>
<div id="show"></div>

    <script type="text/javascript" src="jquery.js">
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $('#show').load('../message.php')
            },1000);
        });
    </script>

</body>

</Html>
