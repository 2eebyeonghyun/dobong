<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>특정 용어에 대해서 번호 붙이지</title>

<script src="../js/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('.term').not(":odd").css("backgroundColor", "Yellow")

                .end()

                .filter(":odd").css("backgroundColor", "Silver");

            //[2] 각각의 주석 / 용어 뒤에 번호 붙이기

            $('.term').each(function (i) { $(this).append("<sup>" + (i + 1) + "</sup>"); });

        });

    </script>

</head>

<body>

    <h3>JQuery is a new kind of JavaScript Library</h3>

    <div>

    <span class="term">JQuery</span>is a new kind of

    <span class="term">JavaScript</span> Library. jQuery is a fast and concise JavaScript Library that simplifies

    <span class="term">HTML</span> document traversing, event handling, animating, and

    <span class="term">Ajax</span> interactions for rapid web development. jQuery is designed to change the way that you write JavaScript.

    </div>

</body>

</html>



출처: https://sify.tistory.com/entry/ManiPulation-append-를-사용하여-각주-번호-넣기 [Sif's blog]