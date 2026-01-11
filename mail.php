<!DOCTYPE html>
<html lang="en">
<body>
    <form method="post" action="sendm.php">
        <div class="control-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                required="required" data-validation-required-message="Please enter your name" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
            <input type="email" name="email" class="form-control" id="email" placeholder="Your Email"
                required="required" data-validation-required-message="Please enter your email" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject"
                required="required" data-validation-required-message="Please enter a subject" />
            <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
            <textarea class="form-control" name="msg" rows="8" id="message" placeholder="Message"
                required="required"
                data-validation-required-message="Please enter your message"></textarea>
            <p class="help-block text-danger"></p>
        </div>
        <div>
            <button class="btn btn-primary py-2 px-4" name="send">Send
                Message</button>
        </div>
    </form>
</body>
</html>