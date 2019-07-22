
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h3 mb-2 text-gray-800"> User: <?php echo $client_query_detail[0]['username']; ?> (<?php echo $client_query_detail[0]['email']; ?>) </h2>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Query Title: <?php echo $client_query_detail[0]['title']; ?>  </h6>
            </div>
            <div class="card-body">
                
                <h6 style="margin:10px 10px 0px 10px;"> Vendor: <?php echo $client_query_detail[0]['store_name']; ?> </h6>
                <h6 style="margin:10px 10px 0px 10px;"> Query Email: <?php echo $client_query_detail[0]['email']; ?> </h6>


                <h6 style="margin:10px 10px 0px 10px;"> Message </h6>

                <div class="" style="padding: 10px;margin:10px;border:1px solid #eee;">
                    <?php echo $client_query_detail[0]['message']; ?>
                </div>

                <h6 style="margin:10px 10px 0px 10px;"> Replies </h6>

                <?php $x=1; if(count($query_reply) != 0) { foreach ($query_reply as $k=>$v) {
                    if($v['user_id'] == 0 || $v['vendor_id'] == null) {
                    ?>
                        
                        <div class="" style="padding: 10px;margin:10px;border:1px solid red;border-radius:10px;background: #ffd7d7;">
                            <h6 style="float: left;padding-right: 10px;line-height: 25px;">Mine: </h6>
                                <?php echo $v['reply'] ?>
                        </div>

                    <?php } else { ?>

                        <div class="" style="padding: 10px;margin:10px;border:1px solid green;border-radius:10px;background: #d5ffda;">
                            <h6 style="float: left;padding-right: 10px;line-height: 25px;">User: </h6>
                            <?php echo $v['reply'] ?>
                        </div>

                    <?php } } } else { echo "<div style='padding: 10px;margin:10px;text-align:center;'>No Reply Found!</div> "; } ?>

                <!-- <div class="" style="padding: 10px;margin:10px;border:1px solid red;">
                    <h6 style="float: left;padding-right: 10px;"> My Reply </h6>
                    This is treply
                </div>

                <div class="" style="padding: 10px;margin:10px;border:1px solid green;">
                    <h6 style="float: left;padding-right: 10px;"> Vendor Reply </h6>
                    This is treply
                </div>
 -->    

                <div style="padding: 10px;margin:10px;border:1px solid #eee;" >
                    <?= form_open('vender/add_vendor_reply/'.$this->uri->segment(4)) ?>
                        <textarea style="width: 100%;" name="reply" required></textarea>
                        <input type="submit" name="submit" value="Reply" class="btn btn-primary">
                    <?= form_close(); ?>
                </div>


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

