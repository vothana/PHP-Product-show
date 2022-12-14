    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="index.php" class="nav__link nav__logo">
                    <i class='bx bxs-disc nav__icon'></i>
                    <span class="nav__logo-name">TDWSO</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>

                        <?php $sql = mysqli_query($con, "select id,categoryName  from category order by categoryName");
                        include('includes/category.php');
                        $result;
                        while ($row = mysqli_fetch_array($sql)) {
                            if ($category_icon[$i] == $row['categoryName']) {
                                $result = $icon[$i];
                            } else {
                                $result = "'bx bxs-circle'";
                            }
                            $i++;
                        ?>
                            <div class="nav__dropdown">
                                <a class="nav__link">
                                    <i class=<?php echo $result; ?>></i>
                                    <span class="nav__name">&nbsp;<?php echo $row['categoryName']; ?></span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>
                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content" style="background: rgb(4, 43, 58, 0.8); ">
                                        <a href="category.php?cid=<?php echo $row['id']; ?>" class=" nav__dropdown-item" style="color: whitesmoke;">|
                                            <?php echo htmlentities($row['categoryName']); ?> |</a>
                                    </div>
                                </div>

                                <?php
                                $catid = $row['id'];
                                $sqlsub_cat = mysqli_query($con, "select id,subcategory  from subcategory where categoryid='$catid'");
                                $num = mysqli_num_rows($sqlsub_cat);
                                if ($num > 0) {
                                    while ($rowSub = mysqli_fetch_array($sqlsub_cat)) {
                                ?>
                                        <div class="nav__dropdown-collapse">
                                            <div class="nav__dropdown-content">
                                                <a href="sub-category.php?scid=<?php echo $rowSub['id']; ?>" class="nav__dropdown-item">
                                                    <?php echo htmlentities($rowSub['subcategory']); ?></a>
                                            </div>
                                        </div>

                                <?php }
                                } ?>

                            </div>

                        <?php } ?>
                        <hr>
                        <div class="nav__dropdown">
                            <a class="nav__link">
                                <i class='bx bx-wrench'></i>
                                <span class="nav__name">Tools</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>
                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="tools/image-compressor/index.html" class="nav__dropdown-item">Img-Resize</a>
                                </div>
                                <div class="nav__dropdown-content">
                                    <a href="tools/image-cropper/index.html" class="nav__dropdown-item">Img-Crop</a>
                                </div>
                            </div>
                        </div>
                        <a class="nav__link" href="purchasing.php">
                            <i class='bx bx-shopping-bag'></i>
                            <span class="nav__name"> &nbsp;បញ្ជារទិញ</span></a>
                        <a href=" http://tdwso.com/login" class="nav__link">
                            <i class='bx bx-log-in'></i>
                            <span class="nav__name">&nbsp;Sign In System</span></a>
                        <a href="admin/index.php" class="nav__link">
                            <i class='bx bx-log-in-circle'></i>
                            <span class="nav__name">&nbsp;Admin</span>
                        </a>
                    </div>
                </div>

            </div>

        </nav>
    </div>