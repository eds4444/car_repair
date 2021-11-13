<?php
/*

Template name: Contacts

*/

?>
<?php get_header(); ?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Сontacts</h1>

         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>

              <h1><?php the_field('hello'); // подключение кастомных полей ?></h1>

               <?php   the_content();  ?>
              <!-- form -->

              <div id="contact-form">

                   <?php echo do_shortcode( '[contact-form-7 id="78" title="Контактная форма 1"]') // сгенер плагином contact form 7 ?>

                  
                 <!-- <form name="contactForm" id="contactForm" method="post" action="">
      					<fieldset>

                        <div class="half">
      						   <label for="contactName">Name <span class="required">*</span></label>
      						   <input name="contactName" type="text" id="contactName" size="35" value="" />
                        </div>

                        <div class="half pull-right">
      						   <label for="contactEmail">Email <span class="required">*</span></label>
      						   <input name="contactEmail" type="text" id="contactEmail" size="35" value="" />
                        </div>

                        <div>
      						   <label for="contactSubject">Subject</label>
      						   <input name="contactSubject" type="text" id="contactSubject" size="35" value="" />
                        </div>

                        <div>
                           <label  for="contactMessage">Message <span class="required">*</span></label>
                           <textarea name="contactMessage"  id="contactMessage" rows="15" cols="50" ></textarea>
                        </div>

                        <div>
                           <button class="submit">Submit</button>
                           <span id="image-loader">
                              <img src="images/loader.gif" alt="" />
                           </span>
                        </div>

      					</fieldset>
      				</form>--> <!-- Form End --> 

                  <!-- contact-warning -->
                  <div id="message-warning"></div>
                  <!-- contact-success -->
      				<div id="message-success">
                     <i class="icon-ok"></i>Your message was sent, thank you!<br />
      				</div>

               </div>

            </section> <!-- section end -->

         </div>

         <div id="secondary" class="four columns end">

            <aside id="sidebar">

               <div class="widget widget_contact">

               <h5>Work time</h5>
                       <?php the_field('work_time'); // подключение кастомных полей ?>

					   <h5>Address</h5>
                       <?php the_field('address'); // подключение кастомных полей ?>

                  <h5>Phone</h5>
                       <?php the_field('phone'); // подключение кастомных полей ?>

                  <h5>Email</h5>
                       <?php the_field('email'); // подключение кастомных полей ?>  
                  
                  
     			   </div>

               <div class="widget widget_photostream">
                  <h5>Photo</h5>
                     <a href=""><img src="<?php the_field('photo'); // подключение кастомных полей ?>" alt=""></a>               
	            </div>

            </aside>

         </div>

      </div>

   </div> <!-- Content End-->

   <?php get_footer(); ?>
