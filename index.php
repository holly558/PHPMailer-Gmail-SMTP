

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Contact Us</title>

  <!--Bootstrap 5 CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

 <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container mt-5" style="max-width:600px;">

    <h1 class="text-center mb-4">Contact Us</h1>


    <!-- Add needs-validation class and novalidate attribute -->

    <form id="contact" action="send-mail.php" method="POST" class="needs-validation" novalidate>

      <div class="form-group ">

        <label for="name" class="form-label">Name *</label>

        <input type="text" name="name" id="name" class="form-control" required 

               value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>" />

          <div class="invalid-feedback">This needs to be a name</div>

      </div>

      <div class="form-group mb-3">

        <label for="email" class="form-label">Email *</label>

        <input type="email" name="email" id="email" class="form-control" required

               value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" />

        <div class="invalid-feedback">

          Invalid email!

        </div>

      </div>

      <div class="form-group mb-3">

        <label for="subject" class="form-label">Subject *</label>

        <input type="text" name="subject" id="subject" class="form-control" maxlength="100" required

               value="<?php if (isset($_POST['subject'])) echo htmlspecialchars($_POST['subject']); ?>" />

        <div class="invalid-feedback">

          Please enter a subject.

        </div>

      </div>

      <div class="form-group mb-3">

        <label for="body" class="form-label">Message *</label>

        <textarea name="body" id="body" class="form-control" rows="6" maxlength="1000" required><?php 

          if (isset($_POST['body'])) echo htmlspecialchars($_POST['body']); ?></textarea>

        <div class="invalid-feedback">

          Please write your message.

        </div>

      </div>

      <div class="form-group mb-3 form-check">

        <input type="checkbox" name="copy" id="copy" class="form-check-input" value="true" />

        <label for="copy" class="form-check-label">Send me a copy of this message</label>

      </div>

      <input type="submit" class="btn btn-success my-3 w-100" value="Send Message">

    </form>

  </div>

<script>

// Bootstrap5 js validation for disabling form submissions if there are invalid fields

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

</script>

<!--Bootstrap 5 JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>