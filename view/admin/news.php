<?php  
    include("../../config/config.php");
    include("../../config/auth.php");
    $icon = "News";
    $fav = "news";
    include("header.php");

?>



    <div class="col-9">
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-contact contact_form" method="post" id="contactForm" novalidate="novalidate">
                    <div class="row">
                    <div class="col-12">
                    <div class="form-group">
                    <input class="form-control placeholder hide-on-focus" name="subject" id="subject" type="text" placeholder="Enter Subject">
                    </div>
                </div>
                        <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100 placeholder hide-on-focus" name="message" id="message" cols="30" rows="9" placeholder="write something..."></textarea>
                        </div>
                    </div>
                </div>
                <input id="upload_img" type="file" name="upload_img" placeholder="Photo">
                <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
            </div>

        </div>
        </div>
    </section>
    </div>

<?php  

    include("footer.php");

?>