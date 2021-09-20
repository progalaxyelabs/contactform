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
                            <?php foreach($data as $datas): ?>
                            <tr>
                                <th scope="row"><?=$datas->contact_form_id ?></th>
                                <td><?=$datas->contact_name ?></td>
                                <td><?=$datas->contact_email ?></td>
                                <td><?=$datas->contact_message ?></td>
                                <td><?=$datas->created_at ?></td>
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
                        <?php for($j=1;$j<=$page_num;$j++): ?>
                        <li class="page-item" id=page<?=$j?>><a class="page-link"
                                href="/home/dashboard?page=<?=$j?>"><?=$j?></a>
                        </li>
                        <?php endfor; ?>
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

    <script type="text/javascript">
    var total_pages = <?=$page_num?>;
    var value = <?= $_GET['page'] ?>;

    for (let i = 1; i < (value - 2) && (value - 2); i++) {
        let temp = document.getElementById('page' + i);
        let prev_dot = value - 3;
        console.log("prev=" + prev_dot);
        console.log('i=' + i);
        if (i == prev_dot) {
            let hidden_prev = document.getElementById('page' + (i + 1));
            hidden_prev.innerHTML = '<a class="page-link" href="/home/dashboard?page=' + (i + 1) + '">.</a>';
            console.log('working');
        }
        temp.style.display = "none";
    }
    for (let i = (value + 3); i <= total_pages; i++) {
        let temp = document.getElementById('page' + i);
        let next_dot = value + 3;
        if (i == next_dot) {
            let hidden_next = document.getElementById('page' + (i - 1));
            hidden_next.innerHTML = '<a class="page-link" href="/home/dashboard?page=' + (i - 1) + '">.</a>';
            temp.style.display = "none";
        } else {
            temp.style.display = "none";
        }
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>