<?php
/**
 * Template Name: Contact Page
 */
?>

<!-- CONTACT -->
<section id="contact" class="white-bg padding-top-bottom">
  
  <div class="container">
  
    <h1 class="section-title">Keep in Touch</h1>
    <p class="section-description">Are you ready to start your project? Give me a call or drop a line.</p>
    
    <div class="row margin-bottom">
    
      <div class="col-sm-3 col-sm-offset-1 text-center contact-item scrollimation fade-up">
      
        <div class="icon"><i class="fa fa-phone fa-fw"></i></div>
        <h2>Phone</h2>
        <p>+255 714-667-787</p>
      
      </div>
    
      <div class="col-sm-4 text-center contact-item scrollimation fade-up d1">
      
        <a class="icon" href="mailto:mail@example.com"><i class="fa fa-envelope fa-fw"></i></a>
        <h2>Email</h2>
        <p>oscar.eugine@gmail.com</p>
        
      </div>
      
      <div class="col-sm-3 text-center contact-item scrollimation fade-up d2">
      
        <a class="icon" href="http://goo.gl/maps/0m7WQ" target="_blank"><i class="fa fa-map-marker fa-fw"></i></a>
        <h2>Location</h2>
        <p>78 Usa-River <br/>Arusha </p>
        
      </div>
      
    </div>
    
    <div class="row">
    
      <!-- Contact Form -->

      <form id="contact-form" class="col-sm-8 col-sm-offset-2" action="/" method="post" novalidate>
        
        <div class="form-group">
          <label class="control-label" for="contact-name">Name</label>
          <div class="controls">
          <input id="contact-name" name="contactName" placeholder="Your name" class="form-control requiredField" type="text" data-error-empty="Please enter your name">
          </div>
        </div><!-- End name input -->
        
        <div class="form-group">
          <label class="control-label" for="contact-mail">Email</label>
          <div class=" controls">
          <input id="contact-mail" name="email" placeholder="Your email" class="form-control requiredField" type="email" data-error-empty="Please enter your email" data-error-invalid="Invalid email address">
          </div>
        </div><!-- End email input -->
        
        <div class="form-group">
          <label class="control-label" for="contact-message">Message</label>
          <div class="controls">
            <textarea id="contact-message" name="comments"  placeholder="Your message" class="form-control requiredField" rows="8" data-error-empty="Please enter your message"></textarea>
          </div>
        </div><!-- End textarea -->
        
        <p class="text-center"><button name="submit" type="submit" class="btn btn-quattro" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent"><i class="fa fa-paper-plane"></i>Send Message</button></p>
        <input type="hidden" name="submitted" id="submitted" value="true" />
        
      </form><!-- End contact-form -->
    
    </div>
    
  </div>
  
</section>
