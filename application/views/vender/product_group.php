

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Vender Product Group</h1>
 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Product Group</h6>
            </div>
  
            <div class="card-body">

                <?php if(!empty($this->session->flashdata('product_group')) ) { ?>
                   <?= $this->session->flashdata('product_group') ?>      
               <?php } ?>

               <!-- <div class="alert alert-danger text-center">tetete</div> -->
        
                <?= form_open('vender/add_product_group') ?>
                  <input type="hidden" class="form-control" name="vendor_id" value="<?= $vendor_id ?>" required>
                  <input type="text" class="form-control" name="group_name" placeholder="Enter group names" required>
                  <input type="submit" value="+ Add New Group" class="btn btn-success" style="margin-top:10px;">
                <?= form_close(); ?>
              <div class="table-responsive" style="margin-top:20px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <p><button onclick="sortTable(0)">Sort</button></p> -->
                  <thead>
                    <tr>
                      <th>ID#</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Code</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $x; $x=1;  foreach ($vendor_product_groups as $k=>$v) {?>
                    <tr>
                      <td><?= $x++ ?></td>
                      <td><?= $v['group_name']?></td>
                      <td>
                        <a href="<?= site_url('vender/del_product_group/'.$v['id'])?>"><span class="btn btn-danger">Delete</span>&nbsp;</a>
                      </td>
                    </tr>
                      
                  <?php }?>
                  </tbody>
                </table>
                <!-- <script>
 function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("dataTable");
  switching = true;
   dir = "asc"; 
   while (switching) {
     switching = false;
      rows = table.rows;
      for (i = 0; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName('TD')[n];
      y = rows[i + 1].getElementsByTagName('TD')[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++; 
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script> -->
<script>
$(document).ready( function () {
    // $('#dataTable').DataTable();
} );
</script>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <script>
        $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dataTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>