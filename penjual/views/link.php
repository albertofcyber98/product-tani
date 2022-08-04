<link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
<script src="../asset/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="./css/styles.css">
<script type="text/javascript">
    function fixAspect(img) {
        var $img = $(img),
            width = $img.width(),
            height = $img.height(),
            tallAndNarrow = width / height < 1;
        if (tallAndNarrow) {
            $img.addClass('tallAndNarrow');
        }
        $img.addClass('loaded');
    }
</script>