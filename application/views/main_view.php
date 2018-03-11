
<html>
<head>
    <title>Insert New Books</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
</head>

<body>
<div class="container">
    <br/><br/>
    <form method="post" action="<?php echo base_url();?>main/index">
    <input type="submit" name="btn_for_borower_page" value="borrower Page">
    </form>
    <br/><br/><br/>
    <h3 align="center">Insert Book to Library</h3><br/>

    <form method="post" action="<?php echo base_url()?>main/form_validation">

        <?php
        if(isset($user_data))
        {
            foreach ($user_data->result() as $row) {
                ?>
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="book_name" value="<?php echo $row->book_name; ?>" class="form-control">
                    <span class="text-danger"><?php echo form_error("book_name"); ?></span>
                </div>

                <div class="form-group">
                    <label>Book Author</label>
                    <input type="text" name="book_author" value="<?php echo $row->book_author?>" class="form-control">
                    <span class="text-danger"><?php echo form_error("book_author"); ?></span>
                </div>

                <div class="form-group">
                    <input type="hidden" name="hidden_id" value="<?php echo $row->book_id; ?>">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
                </div>
                <?php
            }
        }
        else{
        ?>

        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="book_name" class="form-control">
            <span class="text-danger"><?php echo form_error("book_name"); ?></span>
        </div>

        <div class="form-group">
            <label>Book Author</label>
            <input type="text" name="book_author" class="form-control">
            <span class="text-danger"><?php echo form_error("book_author"); ?></span>
        </div>

        <div class="form-group">
            <input type="submit" name="insert" value="Insert" class="btn btn-info">
        </div>
        <?php
    }
        ?>
    </form>
    <br/><br/>

    <h3 align="center">Books in Library</h3><br/>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Book Author</th>
            </tr>
            <?php
            if($fetch_data->num_rows()>0)
            {
                foreach ($fetch_data->result()as $row)
                {
                    ?>
                        <tr>
                            <td><?php echo $row->book_id?></td>
                            <td><?php echo $row->book_name?></td>
                            <td><?php echo $row->book_author?></td>
                            <td><a href="#" class="delete_data" id="<?php echo $row->book_id?>">Delete</a> </td>
                            <td><a href="<?php echo base_url();?>main/update_data/<?php echo $row->book_id ?>">Edit</a> </td>
                        </tr>
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
    </div>

    <script>
        $(document).ready(function () {
            $('.delete_data').click(function () {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this?"))
                {
                    window.location="<?Php echo base_url();?>main/delete_data/"+id;
                }
                else {
                    return false;
                }
            });
        });
    </script>
</div>
</body>
</html>




