
<html>
<head>
    <title>Insert New Borrw Detail</title>
    <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/DataTables/datatables.min.css">
    <script type="text/javascript" src="<?php echo base_url();?>js/DataTables/datatables.min.js"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <br/><br/>
    <form method="post" action="<?php echo base_url();?>main/index">
        <input type="submit" name="btn_for_books_page" value="Library Books">
    </form>
    <br/><br/><br/>
    <h3 align="center">Insert New Borrowing</h3><br/>

    <form method="post" action="<?php echo base_url()?>main/form_validation2">

        <?php
        if(isset($user_data))
        {
            foreach ($user_data->result() as $row) {
                ?>
                <div class="form-group">
                    <label>Borrower Name</label>
                    <input type="text" name="borrower_name" class="form-control">
                    <span class="text-danger"><?php echo form_error("borrower_name"); ?></span>
                </div>

                <div class="form-group">
                    <label>Borrowed Book</label>
                    <input type="text" name="borrowed_book" class="form-control">
                    <span class="text-danger"><?php echo form_error("borrowed_book"); ?></span>
                </div>

                <div class="form-group">
                    <label>Borrowed Date</label>
                    <input type="text" name="borrowed_date" class="form-control">
                    <span class="text-danger"><?php echo form_error("borrowed_date"); ?></span>
                </div>

                <div class="form-group">
                    <label>Lending Date</label>
                    <input type="text" name="lending_date" class="form-control">
                    <span class="text-danger"><?php echo form_error("lending_date"); ?></span>
                </div>

                <div class="form-group">
                    <input type="hidden" name="hidden_id2" value="<?php echo $row->borrowing_id; ?>">
                    <input type="submit" name="insert" value="Insert" class="btn btn-info">
                </div>

                <?php
            }
        }
        else{
            ?>

            <div class="form-group">
                <label>Borrower Name</label>

                <select class="form-control" name="borrower_name">
                    <?php

                    foreach($borrower_name as $row)
                    {
                        echo '<option value="'.$row->borrower_name.'">'.$row->borrower_name.'</option>';
                    }
                    ?>
                </select>


                <!--   <input type="text" name="borrower_name" class="form-control">  -->
                <span class="text-danger"><?php echo form_error("borrower_name"); ?></span>
            </div>

            <div class="form-group">
                <label>Borrowed Book</label>

                <select class="form-control" name="borrowed_book">
                    <?php

                    foreach($book_name as $row1)
                    {
                        echo '<option value="'.$row1->book_name.'">'.$row1->book_name.'</option>';
                    }
                    ?>
                </select>

                <!-- <input type="text" name="borrowed_book" class="form-control"> -->
                <span class="text-danger"><?php echo form_error("borrowed_book"); ?></span>
            </div>

            <div class="form-group">
                <label>Borrowed Date</label>
                <input type="text" name="borrowed_date" class="form-control">
                <span class="text-danger"><?php echo form_error("borrowed_date"); ?></span>
            </div>

            <div class="form-group">
                <label>Lending Date</label>
                <input type="text" name="lending_date" class="form-control">
                <span class="text-danger"><?php echo form_error("lending_date"); ?></span>
            </div>

            <div class="form-group">
                <input type="submit" name="insert" value="Insert" class="btn btn-info">
            </div>
            <?php
        }
        ?>
    </form>
</div>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h3>Borrowed Details</h3>

                <table id="book-table" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr><td>Borrower Name</td><td>Borrowed Book</td><td>Borrowed Date</td><td>Lending Date</td></tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#book-table').DataTable({
                "ajax": {
                    url : "<?php echo site_url("main/borrow_page") ?>",
                    type : 'GET'
                },
            });
        });
    </script>


</body>
</html>


