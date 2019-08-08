

    
        <nav class="navbar navbar-expand-lg navbar-light " style="background:linear-gradient(90deg,#0b58f1 0%,#3fc1ff 100%); padding: 15px;">
            <a class="navbar-brand text-light" href="#" style="color: #fff0 !important;">Navbar</a>
            
           
          </nav>


          <div class="col-sm-12">
                <div class="vendor-contact-form">
                        <p class="text-center p-1" style="color:black;">Create Your Query</p>
                        <hr>
                    <?= form_open('Main/send_query/'.$this->uri->segment(4)) ?>
                    <div class="form-group">
                          <label for="formGroupExampleInput">Title</label>
                          <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Title" required>
                        </div>  
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Email</label>
                          <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                                <label for="formGroupExampleInput2">Message</label>
                                <textarea class="form-control" rows="5" name="message"  placeholder="Write Your Query..." required></textarea>
                        </div>
                        <button type="submit" class="btn " style="background:#5390ff; color:white; width:100%; padding: 10px;">Send</button>
                      <?= form_close(); ?>
                </div>
                 
          </div>
     


  



	

