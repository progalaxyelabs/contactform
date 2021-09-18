<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
    <?php 
        $size=sizeof($data);
        $page_num=ceil($size/10);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1></h1>
                <div class="pagination justify-content-center">
                    <table style="margin-top:10%;" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php for($from;$page!=$from && $from<$size;$from++): ?>
                            <tr>
                                <th scope="row"><?=$data[$from]->contact_form_id ?></th>
                                <td><?=$data[$from]->contact_name ?></td>
                                <td><?=$data[$from]->contact_email ?></td>
                                <td><?=$data[$from]->contact_message ?></td>
                                <td><?=$data[$from]->created_at ?></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul id="myid" class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link"
                                <?php $prev = $_GET['page'];if($prev == 1){ echo "";}else{$prev=$prev-1;echo "href='/home/dashboard?page=$prev'";}?>
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for($j=1;$j<=$page_num;$j++): ?>
                        <li class="page-item"><a class="page-link" href="/home/dashboard?page=<?=$j?>"
                                id="page<?=$j?>"><?=$j?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link"
                                <?php $next = $_GET['page'];if($next == $page_num){ echo "";}else{$next=$next+1;echo "href='/home/dashboard?page=$next'";}?>
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <a style="text-decoration: none;" class="pagination justify-content-center" href="/home/logout">Logout</a>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
    </script>

    <script type="text/javascript">

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>