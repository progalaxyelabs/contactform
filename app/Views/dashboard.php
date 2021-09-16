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
        $page=sizeof($data);
        $page_num=ceil($page/2);
        $page=ceil($page/$page_num);
        $from=0;
        /*if($_GET['from']=="")
            $from=0;
        else
            $from=$_GET['from'];*/
        
        
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
                            <?php for($from;$page!=$from;$from++): ?>
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
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for($j=1;$j<=$page_num;$j++): ?>
                        <li class="page-item"><a class="page-link"><?=$j?></a></li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <a style="text-decoration: none;" class="pagination justify-content-center" href="/home/logout">Logout</a>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>