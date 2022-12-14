<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TDWSO : Parchasing</title>
  <link rel="shortcut icon" href="./home/logo.png">
  <link rel="stylesheet" href="./form/style.css" />
  <link rel="shortcut icon" href="images/logo.png">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


</head>

<body>
  <div class="container">
    <span class="big-circle"></span>
    <img src="img/shape.png" class="square" alt="" />
    <div class="form">
      <div class="contact-info">
        <h3 class="title">អ្នកមិនទាន់ចុះឈ្មោះមែនទេ?</h3>
        <p class="text">
          សូមធ្វើការទំនាក់ទំនងមកកាន់ក្រុមការងារ TDWSO ដើម្បីធ្វើការចុឈ្មោះ
          និងទទួលបានតម្លៃពិសេសសម្រាប់លក់បន្ត ឬប្រើប្រាស់
        </p>
        <div class="info">
          <div class="information">
            <img src="./form/img/location.png" class="icon" alt="" />
            <p>ទួលសង្កែរ ភ្នំពេញ</p>
          </div>
          <div class="information">
            <img src="./form/img/email.png" class="icon" alt="" />
            <p>tdwso.info@gmail.com</p>
          </div>
          <div class="information">
            <img src="./form/img/phone.png" class="icon" alt="" />
            <p>+855 10554161</p>
          </div>
        </div>
        <div class="social-media">
          <p>តាមរយៈ :</p>
          <?php include('includes/link-socail.php') ?>
          <div class="social-icons">
            <a href="<?php echo $facebook ?>">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="<?php echo $telegram ?>">
              <i class="fab fa-telegram"></i>
            </a>
            <a href="<?php echo $youtube ?>">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
          <?php ?>
        </div>
      </div>
      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>
        <form action="https://formsubmit.co/chyvothana.12@gmail.com" method="POST" autocomplete="off">
          <input type="hidden" name="_subject" value="មានអ្នកទិញថ្មីពីវេបសាយរបស់អ្នក!">
          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_captcha" value="false">
          <h3 class="title">កម្មង់ផលិតផល</h3>
          <div class="input-container">
            <input type="text" name="អតិថិជនឈ្មោះ" class="input" />
            <label for="">ឈ្មោះអតិថិជន</label>
            <span>ឈ្មោះអតិថិជន</span>
          </div>
          <div class="input-container">
            <input type="text" name="លេខទូរស័ព្ទអតិថិជន" class="input" required />
            <label for="">លេខទូរស័ព្ទអតិថិជន</label>
            <span>លេខទូរស័ព្ទអតិថិជន</span>
          </div>
          <div class="input-container">
            <input type="text" name="ទីតាំងអតិថិជន" class="input" required />
            <label for="">ទីតាំងអតិថិជន</label>
            <span>ទីតាំងអតិថិជន</span>
          </div>
          <div class="input-container">
            <input type="text" name="ID អ្នកលក់" class="input" required />
            <label for="">ID អ្នកលក់</label>
            <span>ID អ្នកលក់</span>
          </div>
          <div class="input-container">
            <input type="text" name="ID ផលិតផល" class="input" required />
            <label for="">ID ផលិតផល (tcode)</label>
            <span>ID ផលិតផល</span>
          </div>
          <div class="input-container">
            <input type="text" name="តម្លៃលក់" class="input" required />
            <label for="">តម្លៃលក់</label>
            <span>តម្លៃលក់</span>
          </div>
          <div class="input-container">
            <select name="សេវា" required>
              <option value="អតិថិជនអ្នកចេញ">អតិថិជនអ្នកចេញ</option>
              <option value="អ្នកលក់អ្នកចេញ">អ្នកលក់អ្នកចេញ</option>
            </select>
            <span>តម្លៃលក់</span>
          </div>
          <div class="input-container textarea">
            <textarea name="ចំណាំផ្សេងៗ" class="input"></textarea>
            <label for="">ចំណាំផ្សេងៗ</label>
            <span>ចំណាំផ្សេងៗ</span>
          </div>
          <input type="hidden" name="_next" value="https://www.tdwso.store/pages/thanks.php">
          <input type="submit" value="បញ្ជាទិញ" class="btn" />
        </form>
      </div>
    </div>
  </div>
  <script src="./form/app.js"></script>
</body>

</html>