<?php
include "include/db.php";
include "include/layout/header.php";

if (isset($_GET['id'])) {
  $postha = $connection->query("SELECT * FROM posts WHERE category_id={$_GET['id']} ORDER BY id DESC LIMIT 4");
} else {
  $postha = $connection->query("SELECT * FROM posts ORDER BY id DESC LIMIT 4");
}

?>
<main>
  <!-- Slider Section -->
  <?php include "include/layout/slider.php"; ?>
  <!-- Content Section -->
  <section class="mt-4">
    <div class="row">
      <!-- Posts Content -->
      <div class="col-lg-8">
        <div class="row g-3">

          <?php foreach ($postha as $post):
            $category = $connection->query("SELECT * FROM categories WHERE id={$post['category_id']}")->fetch();
          ?>
            <div class="col-sm-6">
              <div class="card">
                <img src="./assets/images/<?= $post['image'] ?>" class="card-img-top" alt="post-image" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-bold"><?= $post['title'] ?></h5>
                    <div>
                      <span class="badge text-bg-secondary"><?= $category['title'] ?></span>
                    </div>
                  </div>
                  <p class="card-text text-secondary pt-3">
                    <?= substr($post['body'], 0, 150) . "..."  ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="single.html" class="btn btn-sm btn-dark">مشاهده</a>

                    <p class="fs-7 mb-0">نویسنده : <?= $post['author'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>

      <!-- Sidebar Section -->
      <?php include "include/layout/sidebar.php" ?>
    </div>
  </section>
</main>

<!-- Footer Section -->
<?php include "include/layout/footer.php" ?>