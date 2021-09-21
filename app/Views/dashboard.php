<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/bootstrap.css">

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
                                <th style="border-top-left-radius: 8px;" scope="col">#</th>
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
                    <ul class="pagination justify-content-center">
                        <li class="page-item" id="myid">
                            <a class="page-link" href="/home/dashboard?page=1" aria-label="first">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" id="myid">
                            <a class="page-link"
                                <?php $prev = $get;if($prev == 1){ echo "";}else{$prev=$prev-1;echo "href='/home/dashboard?page=$prev'";}?>
                                aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                            </a>
                        </li>
                        <?php
                            $lower = $get;
                            if($lower>1){
                                $lower-=1;
                                echo '<li class="page-item" id="myid"><a class="page-link" id="lower_anchor"
                                href="/home/dashboard?page='.$lower.'">'.$lower.'</a></li>';
                            }
                         ?>
                        <li class="page-item active" id="myid"><a class="page-link"
                                href="/home/dashboard?page=<?=$get?>"><?=$get?></a>
                        </li>
                        <?php
                            $upper = $get;
                            if($upper<$page_num){
                                $upper+=1;
                                echo '<li class="page-item" id="myid"><a class="page-link" id="upper_anchor"
                                href="/home/dashboard?page='.$upper.'">'.$upper.'</a></li>';
                            }
                         ?>
                        <li class="page-item" id="myid">
                            <a class="page-link"
                                <?php $next = $get;if($next == $page_num){ echo "";}else{$next=$next+1;echo "href='/home/dashboard?page=$next'";}?>
                                aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                            </a>
                        </li>
                        <li class="page-item" id="myid">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>