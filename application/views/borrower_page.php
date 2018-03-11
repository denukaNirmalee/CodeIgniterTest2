
<html>
<head>
    <title>Insert New Borrw Detail</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
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

               <select class="form-control" name="book_name">
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
    <br/><br/>

    <table id="" class="display" cellspacing="0" width="70%">
        <thead>
        <tr>
            <th>Borrower Name</th>
            <th>Borrowed Book</th>
            <th>Borrowed Date</th>
            <th>Lending Date</th>
        </tr>
        </thead>
        <?php
        if($fetch_data2->num_rows()>0)
        {
            foreach ($fetch_data2->result()as $row)
            {
                ?>
                <tfoot>
                <tr>
                    <td><?php echo $row->borrower_name?></td>
                    <td><?php echo $row->borrowed_book?></td>
                    <td><?php echo $row->borrowed_date?></td>
                    <td><?php echo $row->lending_date?></td>

                </tr>
                </tfoot>
                <?php
            }
        }
        else{
            ?>
            <tr>
                <td colspan="3">No Data Found</td>
            </tr>
            <?php
        }
        ?>
    </table>


    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js">
    $(document).ready(function() {
            $('table.display').DataTable();
        } );
    </script>


</div>
</body>
</html>




