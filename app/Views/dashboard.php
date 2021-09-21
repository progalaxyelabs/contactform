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
        $size = $cout;
        $page_num=ceil($cout/10);
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
                            <?php foreach($data as $row): ?>
                            <tr>
                                <th scope="row"><?=$row->contact_form_id ?></th>
                                <td><?=$row->contact_name ?></td>
                                <td><?=$row->contact_email ?></td>
                                <td><?=$row->contact_message ?></td>
                                <td><?=$row->created_at ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul id="myid" class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="/home/dashboard?page=1" aria-label="first">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                                <?php $prev = $_GET['page'];if($prev == 1){ echo "";}else{$prev=$prev-1;echo "href='/home/dashboard?page=$prev'";}?>
                                aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                            </a>
                        </li>
                        <li class="page-item" id="lower"><a class="page-link" id="lower_anchor"
                                href="/home/dashboard?page=<?php $lower = $_GET['page']; $lower-=1; echo $lower?>"><?=$lower?></a>
                        </li>
                        <li class="page-item"><a class="page-link"
                                href="/home/dashboard?page=<?$_GET['page']?>"><?=$_GET['page']?></a>
                        </li>
                        <li class="page-item" id="upper"><a class="page-link" id="upper_anchor"
                                href="/home/dashboard?page=<?php $upper = $_GET['page']; $upper+=1; echo $upper?>"><?=$upper?></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                                <?php $next = $_GET['page'];if($next == $page_num){ echo "";}else{$next=$next+1;echo "href='/home/dashboard?page=$next'";}?>
                                aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/home/dashboard?page=<?=$page_num?>" aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <div class="pagination justify-content-center">
        <a style="text-decoration: none;" href="/home/logout">Logout</a>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
    </script>

    <script>
    var total = <?=$page_num?>;
    var lower = document.getElementById('lower');
    var upper = document.getElementById('upper');
    let lower_anchor = document.getElementById('lower_anchor');
    var upper_anchor = document.getElementById('upper_anchor');
    
    if (lower_anchor.innerHTML <= 0) {
        lower.style.display = "none";
    }
    if (upper_anchor.innerHTML >= total) {
        upper.style.display = "none";
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>