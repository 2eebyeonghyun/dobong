<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Ư�� �� ���ؼ� ��ȣ ������</title>

<script src="../js/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('.term').not(":odd").css("backgroundColor", "Yellow")

                .end()

                .filter(":odd").css("backgroundColor", "Silver");

            //[2] ������ �ּ� / ��� �ڿ� ��ȣ ���̱�

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



��ó: https://sify.tistory.com/entry/ManiPulation-append-��-����Ͽ�-����-��ȣ-�ֱ� [Sif's blog]